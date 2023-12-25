<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\FarmHouse;
use App\Models\UserFarms;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'inputFirstName' => ['required', 'string', 'max:255'],
            'inputLastName' => ['required', 'string', 'max:255'],
            'farmName' => ['required', 'string', 'max:255'],
            'farm_ifu' => ['required', 'string', 'max:255', 'unique:farm_houses'],
            'rabbitRaces' => ['required', 'string', 'max:255'],
            'rabbitCount' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'email' => $data['email'],
            'first_name' => $data['inputFirstName'],
            'last_name' => $data['inputLastName'],
            'provider_id' => $data['password'],
            'address' => $data['inputAddress'],
            'number' => $data['inputPhoneNumber'],
            'city' => $data['inputCity'],
            'ZIP' => $data['inputZip'],
            'password' => Hash::make($data['password']),
        ]);
        //register farm if its farmer registration
        try {
            $farm = new FarmHouse();
            
            $farm->farm_name = $data['farmName'];
            $farm->farm_ifu = $data['farm_ifu'];
            $farm->phone_number = $data['inputPhoneNumber'] ?? "00000";

            $farm->save();

            $user_farm = new UserFarms();
            $user_farm->role = 'owner';
            $user_farm->users_id = $user->id;
            $user_farm->farm_houses_id = $farm->id;
            $user_farm->save();
        }

        // If we catch an exception, we will roll back so nothing gets messed
        // up in the database. Then we'll re-throw the exception so it can
        // be handled how the developer sees fit for their applications.
        catch (\Exception $e) {

            throw $e;
        }

        return $user;
    }
}
