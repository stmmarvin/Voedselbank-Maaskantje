<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leverancier extends Model
{
    protected $table = 'Leverancier';

    protected $primaryKey = 'Id';

    public $timestamps = false;

    protected $fillable = [
        'bedrijfsnaam',
        'adres',
        'contact_naam',
        'contact_email',
        'telefoon',
        'eerstvolgende_levering',
    ];

    protected $casts = [
        'EerstvolgendeLevering' => 'datetime',
    ];

    private const COLUMN_MAP = [
        'id' => 'Id',
        'bedrijfsnaam' => 'Bedrijfsnaam',
        'adres' => 'Adres',
        'contact_naam' => 'ContactNaam',
        'contact_email' => 'ContactEmail',
        'telefoon' => 'Telefoon',
        'eerstvolgende_levering' => 'EerstvolgendeLevering',
    ];

    public function getAttribute($key)
    {
        if (isset(self::COLUMN_MAP[$key])) {
            return parent::getAttribute(self::COLUMN_MAP[$key]);
        }

        return parent::getAttribute($key);
    }

    public function setAttribute($key, $value)
    {
        if (isset(self::COLUMN_MAP[$key])) {
            $key = self::COLUMN_MAP[$key];
        }

        return parent::setAttribute($key, $value);
    }

    public function voorraad()
    {
        return $this->hasMany(Voorraad::class);
    }
}
