<?php

namespace App\Http\Controllers;

use App\Models\Bunny;
use Illuminate\Http\Request;

class BunnyController extends Controller
{
    public function index()
    {
        return view('pages.bunny-list');
    }

    
    function getBunnyData()
    {
        $user = Auth()->user();
        $bunnies = Bunny::all();
        return response()->json(['bunnies' => $bunnies]);
    }
}
