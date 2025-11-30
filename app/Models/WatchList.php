<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WatchList extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'image',
        'description'
    ];

    // All movies associated with the watch list
    public function movies()
    {
        return $this->belongsToMany(Movie::class);
    }

    // The creator of the watch list
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
