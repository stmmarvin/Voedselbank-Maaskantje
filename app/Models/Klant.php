<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Klant extends Model
{
    protected $table = 'Klant';
    protected $primaryKey = 'Id';
    public $timestamps = false;

    protected $fillable = [
        'Inlog_Id', 'GezinsNaam', 'Adres', 'Telefoon', 'Email', 'SpecifiekeWensen', 'Gezinssamenstelling',
    ];

    public function inlog()
    {
        return $this->belongsTo(Inlog::class, 'Inlog_Id');
    }
}
