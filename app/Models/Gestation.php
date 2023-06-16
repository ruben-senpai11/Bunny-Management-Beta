<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gestation extends Model
{
    use HasFactory;
    public function mating()
    {
        return $this->belongsTo(Mating::class);
    }
}
