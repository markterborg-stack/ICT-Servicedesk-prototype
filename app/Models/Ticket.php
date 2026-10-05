<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'title',
        'description',
        'medewerker_id',
        'category_id',
        'priority',
        'status',
        'solution',
    ];

    public function medewerker()
    {
        return $this->belongsTo(Medewerker::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}