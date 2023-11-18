<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditBunnyByidRequest;
use App\Models\Bunny;
use App\Models\Mating;
use App\Models\UserFarms;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Psy\Command\EditCommand;
use Redirect;

function getUserId(){        
    $user_id = auth()->user()->id;   
    $current_farm = UserFarms::where('users_id', $user_id)->value('farm_houses_id');
    return $current_farm;
}

class MatingController extends Controller
{
    public $uid, $gender, $destination, $date_birth, $state, $race, $color, $weight, $age;

    public function rules(): array
    {
        
        return [
            'male_uid' => 'required',
            'female_uid' => 'required',
            'mating_date' => 'required'
        ];
    }

    public function saveMating(Request $request)
    {
        // dd($request->all());
        $current_farm = getUserId();

        $female_uid = $request->female_uid;
        $male_uid = $request->male_uid;

        $male_id = intval(Bunny::where("uid", $male_uid)->value('id'));
        $female_id = intval(Bunny::where("uid", $female_uid)->value('id'));

        try {
            $mating = new Mating();
            $mating->female_id = $female_id;
            $mating->male_id = $male_id;
            $mating->mating_date = $request->mating_date;
            $mating->remark = $request->remark;
            $mating->farm_houses_id = $current_farm;

            $mating->save();
        } catch (\Exception $e) {
            throw $e;
        };
        //  dd($request->all());

        // Enregistrer les donnees des forms dynamiques
        foreach ($request->all() as $key => $value) {
            // dd($request->all());

            if (Str::startsWith($key, 'female_uid_')) {
                $index = substr($key, strlen('female_uid_')); // Récupérer la partie numérique du nom de champ (par exemple, uid_1 -> 1)

                $female_uid = $request->input('female_uid_' . $index);
                $male_uid = $request->input('male_uid_' . $index);
                
                $male_id = intval(Bunny::where("uid", $male_uid)->value('id'));
                $female_id = intval(Bunny::where("uid", $female_uid)->value('id'));
                $date = $request->input('mating_date_' . $index);
                $remark = $request->input('remark_' . $index);

                try {
                    $mating = new Mating();
                    $mating->male_id = $male_id;
                    $mating->female_id = $female_id;
                    $mating->mating_date = $date;
                    $mating->remark = $remark;
                    $mating->farm_houses_id = $current_farm;
                    
                    $mating->save();
                } catch (\Exception $e) {
                    throw $e;
                }
            }
        } 
        session()->flash('message', 'Enregistrement effectué.');

        return Redirect()->route('matings');
    }

    public function render()
    {
        return view('pages.matings', []);
    }

    
// --------------------Matings List-----------------------------------

    public function getMatingData()
    {
        $user = Auth()->user();
        $current_user = getUserId();
        $matings = Mating::where('farm_houses_id', intval($current_user))->get();
        $matingDatas = $matings->map(function ($mating) {
            $female_uid = Bunny::where('id', $mating->female_id)->pluck('uid');
            $male_uid = Bunny::where('id', $mating->male_id)->pluck('uid');
            $mating["female_uid"] = $female_uid->first();
            $mating["male_uid"] = $male_uid->first();
            return $mating;
        });
        return response()->json(['matings' => $matingDatas]);
    }

    public function showMatingDataById(int $id)
    {
        $bunny = Mating::findOrFail($id);
        $maleParentUid = null;
        $femaleParentUid = null;
        if ($bunny->gestation_id) {
            $gestation = Gestation::find($bunny->gestation_id);
            $maleParentUid = Mating::find(Mating::find($gestation->mating_id)->bunny_male_id)->uid;
            $femaleParentUid = Mating::find(Mating::find($gestation->mating_id)->bunny_female_id)->uid;
        }
        return view('pages.bunny-profile', ['bunny' => $bunny, 'maleUid' => $maleParentUid, 'femaleUid' => $femaleParentUid]);
    }


    public function getMatingId(Request $request)
    {
        $user = Auth()->user();
        $current_farm = getUserId();
        $bunnies = Mating::where('farm_houses_id', intval($current_farm))->where('uid', $request->search)->get();
        return response()->json(['content' => $bunnies]);

        if ($bunnies) {
            return response()->json(['response' => true]);
        } else {
            return response()->json(['response' => false]);
        }
    }

    public function deleteMatingById(Request $request)
    {
        $bunny = Mating::findOrFail($request->id);
        $bunny->delete();
        return Redirect::route('list-bunny');
    }

    public function deleteMatingByIdWithAjax(Request $request)
    {
        $mating = Mating::findOrFail($request->id);
        $mating->delete();
        return response()->json(['response' => true]);
    }

    public function editMatingData(EditMatingByidRequest $request)
    {
        if ($request->idMating) {
            $bunny = Mating::find($request->idMating);
            $bunny->uid = $request->uid;
            $bunny->gender = $request->genre;
            $bunny->gender = $request->genre;

        }
        return back();
    }
}
