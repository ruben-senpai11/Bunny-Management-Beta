<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Session;

class SocialiteController extends Controller
{
    //
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $user = Socialite::driver('google')->user();
        $data = collect($user->user);
        //dd($user);

        $finduser = User::where('provider_id', $user->id)->first();

        if ($finduser) {

            Auth::login($finduser);
          
            return redirect()->intended('/home');

        } else {
            Session::flash('authGoogle', 'true');
            Session::flash('User', $data);
            return redirect()->intended('/test');
        }
      
        // $user->token
    }
}