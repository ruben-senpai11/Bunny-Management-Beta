<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mating extends Model
{
    use HasFactory;
    protected $fillable = [
        'lapin_male_id',
        'lapin_female_id',
        'date_mating',
    ];

    public function male()
    {
        return $this->belongsTo(Bunny::class, 'bunny_male_id');
    }

    public function female()
    {
        return $this->belongsTo(Bunny::class, 'bunny_female_id');
    }

    public function gestation()
    {
        return $this->hasOne(Gestation::class);
    }

    public function palpations()
    {
        return $this->hasMany(Palpation::class);
    }
}
