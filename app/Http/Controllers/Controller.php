<?php

namespace App\Http\Controllers;

use App\Models\FarmHouse;
use App\Models\UserFarms;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function getFarmName(){
        $user_id = auth()->user()->id;   
        $current_farm = UserFarms::where('users_id', $user_id)->value('farm_houses_id');
        $farm_name = FarmHouse::where('id', $current_farm)->value('farm_name');
        return response()->json(['farmName' => $farm_name]);
    }
}
