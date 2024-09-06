<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'developer'
    ];

    public function genreNames()
    {
        return $this->hasMany(Genre::class);
    }
}
