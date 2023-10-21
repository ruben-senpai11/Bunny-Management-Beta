<?php

namespace App\Http\Controllers;

use App\Models\Bunny;
use App\Models\Mating;
use Illuminate\Http\Request;

class ReproductionController extends Controller{

    public function getPlanifications(){
        return view('pages.planifications');
    }
    public function getMatings(){
        return view('pages.matings');
    }
    public function getPalpations(){
        return view('pages.palpations');
    }
    public function getGestations(){
        return view('pages.gestations');
    }
    
    
    public function getMatingsList()
    {
        $user = Auth()->user();
        $current_farm = getUserId();
        $matings = Bunny::where('farm_houses_id', intval($current_farm))->get();
        return response()->json(['matings' => $matings]);
    }
}
