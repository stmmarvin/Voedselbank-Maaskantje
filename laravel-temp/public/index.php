<?php

$path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
$viewBase = dirname(__DIR__).'/resources/views';
$envPath = dirname(__DIR__).'/.env';

$routes = [
    '/' => $viewBase.'/allergie-overzicht.blade.php',
    '/allergie-overzicht' => $viewBase.'/allergie-overzicht.blade.php',
    '/allergie-toevoegen' => $viewBase.'/allergie-toevoegen.blade.php',
    '/allergie-bewerken' => $viewBase.'/allergie-bewerken.blade.php',
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
    $pdo = createPdo($env);

    $rows = $pdo->query(
        'SELECT
            a.Id AS allergie_id,
            a.Naam AS AllergieNaam,
            COALESCE(a.Ernst, "Niet opgegeven") AS Ernst,
            k.Id AS klant_id,
            k.GezinsNaam,
            k.Email,
            k.SpecifiekeWensen
        FROM Allergie a
        LEFT JOIN Klant_Allergie ka ON ka.Allergie_Id = a.Id
        LEFT JOIN Klant k ON k.Id = ka.Klant_Id
        ORDER BY a.Naam ASC, k.GezinsNaam ASC'
    )->fetchAll();

    $uniqueCustomers = [];
    $uniqueAllergies = [];

    foreach ($rows as $row) {
        if (! empty($row['klant_id'])) {
            $uniqueCustomers[$row['klant_id']] = true;
        }

        $uniqueAllergies[$row['allergie_id']] = true;
    }

    return [
        'rows' => $rows,
        'customer_count' => count($uniqueCustomers),
        'allergy_count' => count($uniqueAllergies),
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

function findAllergy(array $env, int $id): ?array
{
    $pdo = createPdo($env);
    $statement = $pdo->prepare('SELECT Id, Naam, Ernst FROM Allergie WHERE Id = :id');
    $statement->execute(['id' => $id]);
    $row = $statement->fetch();

    return $row ?: null;
}

function updateAllergy(array $env, int $id, string $naam, ?string $ernst): void
{
    $pdo = createPdo($env);
    $statement = $pdo->prepare(
        'UPDATE Allergie SET Naam = :naam, Ernst = :ernst WHERE Id = :id'
    );

    $statement->execute([
        'id' => $id,
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
$editFormError = null;
$editFormSuccess = isset($_GET['updated']) ? 'De allergie is bijgewerkt.' : null;
$editAllergy = null;

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

if ($path === '/allergie-bewerken') {
    $editId = (int) ($_GET['id'] ?? $_POST['id'] ?? 0);

    if ($editId > 0) {
        try {
            $editAllergy = findAllergy($env, $editId);
        } catch (Throwable $exception) {
            $editFormError = 'Ophalen mislukt: '.$exception->getMessage();
        }
    }

    if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
        $naam = trim($_POST['naam'] ?? '');
        $ernst = trim($_POST['ernst'] ?? '');

        if ($editId <= 0 || ! $editAllergy) {
            $editFormError = 'De geselecteerde allergie bestaat niet.';
        } elseif ($naam === '') {
            $editFormError = 'Vul een naam voor de allergie in.';
        } elseif (mb_strlen($naam) > 100) {
            $editFormError = 'De naam mag maximaal 100 tekens bevatten.';
        } elseif ($ernst !== '' && mb_strlen($ernst) > 20) {
            $editFormError = 'De ernst mag maximaal 20 tekens bevatten.';
        } else {
            try {
                updateAllergy($env, $editId, $naam, $ernst);
                header('Location: /allergie-bewerken?id='.$editId.'&updated=1');
                exit;
            } catch (Throwable $exception) {
                $editFormError = 'Bijwerken mislukt: '.$exception->getMessage();
            }
        }

        $editAllergy = [
            'Id' => $editId,
            'Naam' => $naam,
            'Ernst' => $ernst,
        ];
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
