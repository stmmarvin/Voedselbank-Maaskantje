<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leverancier extends Model
{
    protected $fillable = [
        'bedrijfsnaam',
        'adres',
        'contact_naam',
        'contact_email',
        'telefoon',
        'eerstvolgende_levering',
    ];

    protected $casts = [
        'eerstvolgende_levering' => 'datetime',
    ];
}
