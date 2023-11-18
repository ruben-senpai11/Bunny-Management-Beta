<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BunnyRace extends Model
{
    use HasFactory;

    public function bunny()
    {
        return $this->belongsTo(Bunny::class);
    }

    public function race()
    {
        return $this->belongsTo(Race::class);
    }
}
