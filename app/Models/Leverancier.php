<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leverancier extends Model
{
    protected $table = 'leverancier';
    
    protected $fillable = [
        'bedrijfsnaam',
        'adres',
        'contact_naam',
        'contact_email',
        'telefoon',
        'eerstvolgende_levering'
    ];
    
    public function voorraad()
    {
        return $this->hasMany(Voorraad::class);
    }
}
