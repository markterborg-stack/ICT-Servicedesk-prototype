<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medewerker extends Model
{
    protected $fillable = [
        'naam',
        'email',
        'telefoon',
        'afdeling',
        'functie',
        'locatie',
    ];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}