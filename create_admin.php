<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Inlog;
use Illuminate\Support\Facades\Hash;

// Verwijder oude admin
Inlog::where('Email', 'admin@voedselbank.nl')->delete();

// Maak nieuwe admin
$admin = Inlog::create([
    'Email' => 'admin@voedselbank.nl',
    'Wachtwoord' => Hash::make('admin123'),
    'Rol' => 'admin',
]);

echo "Admin aangemaakt!\n";
echo "Email: admin@voedselbank.nl\n";
echo "Wachtwoord: admin123\n";
echo "ID: " . $admin->Id . "\n";
