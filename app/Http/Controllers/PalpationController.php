<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditBunnyByidRequest;
use App\Models\Bunny;
use App\Models\Mating;
use App\Models\Palpation;
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

class PalpationController extends Controller
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

    public function savePalpation(Request $request)
    {
        // dd($request->all());
        $current_farm = getUserId();

        // $female_id = intval(Bunny::where("uid", $female_uid)->value('id'));
        // $palpation_id = intVal(Mating::where('female_id', intval(Bunny::where('uid', $request->female_uid)))->value('id'));
        $palpation_id = intVal(optional(Bunny::where('uid', $request->female_uid)->first())->mating->female_id);


        try {
            $palpation = new Palpation();
            $palpation->mating_id = $palpation_id;
            $palpation->palpation_date = $request->mating_date;
            $palpation->palpation_result = $request->palpation_date;
            $palpation->comment = $request->remark;
            $palpation->farm_houses_id = $current_farm;

            $palpation->save();
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
                $date = $request->input('palpation_date_' . $index);
                $remark = $request->input('remark_' . $index);

                try {
                    $palpation = new Palpation();
                    $palpation->male_id = $male_id;
                    $palpation->female_id = $female_id;
                    $palpation->palpation_date = $date;
                    $palpation->remark = $remark;
                    $palpation->farm_houses_id = $current_farm;
                    
                    $palpation->save();
                } catch (\Exception $e) {
                    throw $e;
                }
            }
        } 
        session()->flash('message', 'Enregistrement effectué.');

        return Redirect()->route('palpations');
    }

    public function render()
    {
        return view('pages.palpations', []);
    }

    
    public function getMatingId(Request $request)
    {

        // $user = Auth()->user();
        // $current_farm = getUserId();
        // $bunnies = Bunny::where('farm_houses_id', intval($current_farm))->where('uid', $request->search)->get();
        // return response()->json(['content' => $bunnies]);

        // if ($bunnies) {
        //     return response()->json(['response' => true]);
        // } else {
        //     return response()->json(['response' => false]);
        // }


        $user = Auth()->user();
        $current_farm = getUserId();
        try {
            $bunnies = Bunny::where('farm_houses_id', intval($current_farm))->where('uid', $request->search)->get();            
            $mated_bunnies = Mating::where('farm_houses_id', intval($current_farm))->where('female_id', $bunnies[0]->id)->get();  
            return response()->json(['content' => $mated_bunnies]);
        } catch (\Throwable $th) {
            //throw $th;
        }
        if($bunnies[0]->id){
            return response()->json(['response' => false]);
        }
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
