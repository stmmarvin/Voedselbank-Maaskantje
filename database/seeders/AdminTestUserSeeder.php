<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminTestUserSeeder extends Seeder
{
    public function run()
    {
        // Voeg toe aan Inlog-tabel
        $inlogId = DB::table('Inlog')->insertGetId([
            'Email' => 'admin@test.nl',
            'Wachtwoord' => Hash::make('admin123'),
            'Rol' => 'admin',
            'LaatsteLogin' => now(),
        ]);

        // Voeg toe aan Admin-tabel
        DB::table('Admin')->insert([
            'Inlog_Id' => $inlogId,
            'Naam' => 'Admin Test',
            'Email' => 'admin@test.nl',
        ]);
    }
}
