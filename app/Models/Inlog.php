<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Inlog extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'Inlog';
    protected $primaryKey = 'Id';
    public $timestamps = false;

    protected $fillable = ['Email', 'Wachtwoord', 'Rol', 'LaatsteLogin'];

    protected $hidden = ['Wachtwoord', 'remember_token'];

    protected $casts = [
        'LaatsteLogin' => 'datetime',
    ];

    public function getAuthPassword()
    {
        return $this->Wachtwoord;
    }

    public function getAuthIdentifierName()
    {
        return 'Email';
    }

    public function getAuthIdentifier()
    {
        return $this->Email;
    }

    public function isAdmin(): bool
    {
        return $this->Rol === 'admin';
    }

    public function klant()
    {
        return $this->hasOne(Klant::class, 'Inlog_Id', 'Id');
    }
}
