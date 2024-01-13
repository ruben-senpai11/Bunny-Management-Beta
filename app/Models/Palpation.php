<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Palpation extends Model
{
    use HasFactory;

    protected $fillable = [ "arm_houses_id", "mating_id", "palpation_date", "status", "remark" ];

    public function mating()
    {
        return $this->belongsTo(Mating::class);
    }
}
