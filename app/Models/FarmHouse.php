<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FarmHouse extends Model
{
    use HasFactory;
    public function userFarms()
    {
        return $this->hasMany(UserFarms::class);
    }
}
