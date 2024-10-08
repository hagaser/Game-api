<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $fillable = ['genreName'];

    public function game()
    { // Connect tables
        return $this->belongsTo(Game::class);
    }
}
