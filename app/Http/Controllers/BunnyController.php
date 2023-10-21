<?php

namespace App\Http\Controllers;

use App\Models\Bunny;
use App\Models\UserFarms;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Redirect;

function getUserId(){        
    $user_id = auth()->user()->id;   
    $current_farm = UserFarms::where('users_id', $user_id)->value('farm_houses_id');
    return $current_farm;
}

class BunnyController extends Controller
{
    public $uid, $gender, $destination, $date_birth, $state, $race, $color, $weight, $age;

    public function rules(): array
    {
        return [
            'uid' => 'required',
            'gender' => 'required',
            'destination' => 'required',
            'gestation_id' => 'required'
        ];
    }



    public function saveBabyBunny(Request $request)
    {
        // dd($request->all());

        $current_farm = getUserId();

        if ($request->babyBunnyForm) {

            try {
                $babyBunny = new Bunny();
                $babyBunny->uid = $request->uid;
                $babyBunny->gender = $request->gender;
                $babyBunny->destination = $request->destination;
                $babyBunny->gestation_id = $request->gestation_id;
                $babyBunny->state = $request->state;
                $babyBunny->color = $request->color;
                $babyBunny->race = $request->race;
                $babyBunny->weight = $request->weight;
                $babyBunny->farm_houses_id = $current_farm;

                $babyBunny->save();
            } catch (\Exception $e) {
                throw $e;
            };

            // Enregistrer les donnees des forms dynamiques
            foreach ($request->all() as $key => $value) {

                if (Str::startsWith($key, 'uid_')) {
                    $index = substr($key, strlen('uid_')); // Récupérer la partie numérique du nom de champ (par exemple, uid_1 -> 1)

                    $uid = $request->input('uid_' . $index);
                    $gender = $request->input('gender_' . $index);
                    $destination = $request->input('destination_' . $index);
                    $gestation_id = $request->input('gestation_id');
                    $state = $request->input('state_' . $index);
                    $color = $request->input('color_' . $index);
                    $race = $request->input('race_' . $index);
                    $weight = $request->input('weight_' . $index);

                    try {
                        $babyBunny = new Bunny();
                        $babyBunny->uid = $uid;
                        $babyBunny->gender = $gender;
                        $babyBunny->destination = $destination;
                        $babyBunny->gestation_id = $gestation_id;
                        $babyBunny->state = $state;
                        $babyBunny->color = $color;
                        $babyBunny->race = $race;
                        $babyBunny->weight = $weight;
                        $babyBunny->farm_houses_id = $current_farm;

                        $babyBunny->save();
                    } catch (\Exception $e) {
                        throw $e;
                    }
                }
            }
            session()->flash('message', 'Enregistrement effectué.');
        }

        if ($request->bunnyForm) {
            // dd($request->all(), $user_id, $current_farm, var_dump($current_farm));
            // dd(var_dump($request->g_date_birth, $request->g_date_birth_));
            try {
                $bunny = new Bunny();
                $bunny->uid = $request->g_uid;
                $bunny->gender = $request->g_gender;
                $bunny->date_birth = $request->g_date_birth;
                $bunny->destination = $request->g_destination;
                $bunny->age = 'young_adult_bunny';
                $bunny->state = $request->g_state;
                $bunny->color = $request->g_color;
                $bunny->race = $request->g_race;
                $bunny->weight = $request->g_weight;
                $bunny->farm_houses_id = $current_farm;

                $bunny->save();
            } catch (\Exception $e) {
                throw $e;
            };

            // Enregistrer les donnees des forms dynamiques
            foreach ($request->all() as $key => $value) {

                if (Str::startsWith($key, 'g_uid_')) {
                    $index = substr($key, strlen('g_uid_')); // Récupérer la partie numérique du nom de champ (par exemple, uid_1 -> 1)

                    $g_uid = $request->input('g_uid_' . $index);
                    $g_gender = $request->input('g_gender_' . $index);
                    $g_destination = $request->input('g_destination_' . $index);
                    $g_date_birth = $request->input('g_date_birth_' . $index);
                    $g_state = $request->input('g_state_' . $index);
                    $g_color = $request->input('g_color_' . $index);
                    $g_race = $request->input('g_race_' . $index);
                    $g_weight = $request->input('g_weight_' . $index);

                    try {
                        $bunny = new Bunny();

                        $bunny->uid = $g_uid;
                        $bunny->gender = $g_gender;
                        $bunny->destination = $g_destination;
                        $bunny->age = 'young_adult_bunny';
                        $bunny->date_birth = $g_date_birth;
                        $bunny->state = $g_state;
                        $bunny->color = $g_color;
                        $bunny->race = $g_race;
                        $bunny->weight = $g_weight;
                        $bunny->farm_houses_id = $current_farm;

                        $bunny->save();
                    } catch (\Exception $e) {
                        throw $e;
                    }
                }
            }

            //Reset Input Fields    
            $request->input('g_uid') == '';
            $request->input('g_gender') == '';
            $request->input('g_destination') == '';
            $request->input('g_date_birth') == '';
            $request->input('g_state') == '';
            $request->input('g_color') == '';
            $request->input('g_weight') == '';

            session()->flash('g_message', 'Enregistrement effectué.');
        }

        return Redirect::route('create-bunny');
    }

    public function render()
    {
        return view('pages.bunny-create', []);
    }


    public function index()
    {
        return view('pages.bunny-list');
    }

    public function getBunnyData()
    {
        $user = Auth()->user();
        $current_farm = getUserId();
        $bunnies = Bunny::where('farm_houses_id', intval($current_farm))->get();
        return response()->json(['bunnies' => $bunnies]);
    }

    public function showBunnyDataById(int $id)
    {
        $bunny = Bunny::findOrFail($id);
        return view('pages.bunny-profile', ['bunny' => $bunny]);
    }

    public function getBunnyId(Request $request)
    {
        $user = Auth()->user();
        $current_farm = getUserId();
        $bunnies = Bunny::where('farm_houses_id', intval($current_farm))->where('uid', $request->search)->get();
        return response()->json(['content' => $bunnies]);

        if ($bunnies) {
            return response()->json(['response' => true]);
        } else {
            return response()->json(['response' => false]);
        }
    }

    public function deleteBunnyById(Request $request)
    {
        $bunny = Bunny::findOrFail($request->id);
        $bunny->delete();
        return Redirect::route('list-bunny');
    }

    public function deleteBunnyByIdWithAjax(Request $request)
    {
        $bunny = Bunny::findOrFail($request->id);
        $bunny->delete();
        return response()->json(['response' => true]);
    }
}
