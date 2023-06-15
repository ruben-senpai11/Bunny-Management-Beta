<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bunny extends Model
{
    use HasFactory;
    protected $table = 'bunnies';
    public function race()
    {
        return $this->belongsTo(Race::class);
    }
}
