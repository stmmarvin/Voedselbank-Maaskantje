<?php

$path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
$viewBase = dirname(__DIR__).'/resources/views';
$envPath = dirname(__DIR__).'/.env';

$routes = [
    '/' => $viewBase.'/allergie-overzicht.blade.php',
    '/allergie-overzicht' => $viewBase.'/allergie-overzicht.blade.php',
    '/allergie-toevoegen' => $viewBase.'/allergie-toevoegen.blade.php',
];

function readEnvFile(string $path): array
{
    if (! file_exists($path)) {
        return [];
    }

    $values = [];

    foreach (file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
        $line = trim($line);

        if ($line === '' || str_starts_with($line, '#') || ! str_contains($line, '=')) {
            continue;
        }

        [$key, $value] = explode('=', $line, 2);
        $value = trim($value);

        if (
            (str_starts_with($value, '"') && str_ends_with($value, '"')) ||
            (str_starts_with($value, "'") && str_ends_with($value, "'"))
        ) {
            $value = substr($value, 1, -1);
        }

        $values[trim($key)] = $value;
    }

    return $values;
}

function envValue(array $env, string $key, string $default = ''): string
{
    return $env[$key] ?? $_ENV[$key] ?? $_SERVER[$key] ?? $default;
}

function fetchAllergyOverview(array $env): array
{
    $host = envValue($env, 'DB_HOST', '127.0.0.1');
    $port = envValue($env, 'DB_PORT', '3306');
    $database = envValue($env, 'DB_DATABASE', 'VoedselbankSql_dag2');
    $username = envValue($env, 'DB_USERNAME', 'root');
    $password = envValue($env, 'DB_PASSWORD', '');

    $dsn = "mysql:host={$host};port={$port};dbname={$database};charset=utf8mb4";

    $pdo = new PDO($dsn, $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);

    $rows = $pdo->query(
        'SELECT
            k.Id AS klant_id,
            k.GezinsNaam,
            k.Email,
            k.SpecifiekeWensen,
            a.Naam AS AllergieNaam,
            COALESCE(a.Ernst, "Niet opgegeven") AS Ernst
        FROM Klant_Allergie ka
        INNER JOIN Klant k ON k.Id = ka.Klant_Id
        INNER JOIN Allergie a ON a.Id = ka.Allergie_Id
        ORDER BY k.GezinsNaam ASC, a.Naam ASC'
    )->fetchAll();

    $uniqueCustomers = [];

    foreach ($rows as $row) {
        $uniqueCustomers[$row['klant_id']] = true;
    }

    return [
        'rows' => $rows,
        'customer_count' => count($uniqueCustomers),
        'allergy_count' => count($rows),
    ];
}

function createPdo(array $env): PDO
{
    $host = envValue($env, 'DB_HOST', '127.0.0.1');
    $port = envValue($env, 'DB_PORT', '3306');
    $database = envValue($env, 'DB_DATABASE', 'VoedselbankSql_dag2');
    $username = envValue($env, 'DB_USERNAME', 'root');
    $password = envValue($env, 'DB_PASSWORD', '');

    $dsn = "mysql:host={$host};port={$port};dbname={$database};charset=utf8mb4";

    return new PDO($dsn, $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
}

function createAllergy(array $env, string $naam, ?string $ernst): void
{
    $pdo = createPdo($env);
    $statement = $pdo->prepare(
        'INSERT INTO Allergie (Naam, Ernst) VALUES (:naam, :ernst)'
    );

    $statement->execute([
        'naam' => $naam,
        'ernst' => $ernst !== '' ? $ernst : null,
    ]);
}

$env = readEnvFile($envPath);
$dbError = null;
$allergyRows = [];
$customerCount = 0;
$allergyCount = 0;
$formError = null;
$formSuccess = isset($_GET['success']) ? 'De allergie is opgeslagen in de database.' : null;

if ($path === '/allergie-toevoegen' && ($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
    $naam = trim($_POST['naam'] ?? '');
    $ernst = trim($_POST['ernst'] ?? '');

    if ($naam === '') {
        $formError = 'Vul een naam voor de allergie in.';
    } elseif (mb_strlen($naam) > 100) {
        $formError = 'De naam mag maximaal 100 tekens bevatten.';
    } elseif ($ernst !== '' && mb_strlen($ernst) > 20) {
        $formError = 'De ernst mag maximaal 20 tekens bevatten.';
    } else {
        try {
            createAllergy($env, $naam, $ernst);
            header('Location: /allergie-toevoegen?success=1');
            exit;
        } catch (Throwable $exception) {
            $formError = 'Opslaan mislukt: '.$exception->getMessage();
        }
    }
}

try {
    $overview = fetchAllergyOverview($env);
    $allergyRows = $overview['rows'];
    $customerCount = $overview['customer_count'];
    $allergyCount = $overview['allergy_count'];
} catch (Throwable $exception) {
    $dbError = $exception->getMessage();
}

if (array_key_exists($path, $routes) && file_exists($routes[$path])) {
    require $routes[$path];
    exit;
}

http_response_code(404);
header('Content-Type: text/html; charset=UTF-8');
echo '<h1>404 - Pagina niet gevonden</h1>';
