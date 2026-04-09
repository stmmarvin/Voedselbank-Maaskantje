<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voorraad extends Model
{
    protected $table = 'voorraad';
    
    protected $fillable = [
        'leverancier_id',
        'streepjescode',
        'product_naam',
        'categorie',
        'aantal'
    ];
    
    public function leverancier()
    {
        return $this->belongsTo(Leverancier::class);
    }
}
