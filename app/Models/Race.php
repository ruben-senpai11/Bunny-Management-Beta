<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    use HasFactory;
    public function bunnyRace()
    {
        return $this->hasMany(BunnyRace::class);
    }
}
