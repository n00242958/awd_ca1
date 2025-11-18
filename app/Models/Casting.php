<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Casting extends Model
{
    use HasFactory;

    protected $fillable = [
        'movie_id',
        'person',
        'role'
    ];

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
}
