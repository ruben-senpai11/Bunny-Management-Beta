<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bunny extends Model
{
    use HasFactory;
    protected $table = 'bunnies';
    
    protected $fillable = [
        'uid', 'gender', 'destination', 'date_birth', 'state', 'race', 'color', 'weight', 'age', 'gestation_id'
    ];

    public function race()
    {
        return $this->belongsTo(Race::class);
    }

    public function matings()
    {
        return $this->hasMany(Mating::class);
    }

    public function sickBunnies()
    {
        return $this->hasMany(SickBunny::class);
    }

    public function death()
    {
        return $this->hasOne(Death::class);
    }
}
