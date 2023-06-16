<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SickBunny extends Model
{
    use HasFactory;

    public function bunny()
    {
        return $this->belongsTo(Bunny::class);
    }

    public function disease()
    {
        return $this->belongsTo(Disease::class);
    }
}
