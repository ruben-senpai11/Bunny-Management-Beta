<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditBunnyByidRequest;
use App\Models\Bunny;
use App\Models\Gestation;
use App\Models\Mating;
use App\Models\Palpation;
use App\Models\UserFarms;
use Exception;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Psy\Command\EditCommand;
use Redirect;

function getUserId(){        
    $user_id = auth()->user()->id;   
    $current_farm = UserFarms::where('users_id', $user_id)->value('farm_houses_id');
    return $current_farm;
}

class GestationController extends Controller
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

    public function saveGestation(Request $request)
    {
     //dd($request->all());
        $current_farm = getUserId();

        $female_uid = $request->female_uid;
        $female_id = intval(Bunny::where("gender", "female")->where("uid", $female_uid)->value('id'));
        $mating_id = intVal(Mating::where('female_id', $female_id)->where('mating_date', $request->mating_date)->value('id'));
      
        if(intval(Gestation::where("mating_id", $mating_id)->value("id"))){

            session()->flash('alrdy_mated', 'Enregistrement non effectué ! 
             Une gestation a déjà été enregistrée pour cet accouplement.
             Vous pouvez la supprimer avant de procéder.');

            return Redirect()->route('gestations');             
        }else{
        
            try {
                $gestation = new Gestation();

                $gestation->farm_houses_id = $current_farm;
                $gestation->mating_id = $mating_id;
                $gestation->female_id = $female_id;
                $gestation->gestation_date = $request->gestation_date;
                $gestation->babies_number = $request->babies_number;  
                $gestation->veterinary_follow_up = $request->veterinary_follow_up;
                $gestation->remark = $request->remark;

                $gestation->save();
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
                    $female_id = intval(Bunny::where("gender", "female")->where("uid", $female_uid)->value('id'));
                    $mating_id = intVal(Mating::where('female_id', $female_id)->where('mating_date', $request->input('mating_date_' . $index))->value('id'));
                    $gestation_date = $request->input('gestation_date_' . $index);
                    $babies_number = $request->input('babies_number_' . $index);
                    $gestation->veterinary_follow_up = $request->input('veterinary_follow_up_' . $index);
                    $remark = $request->input('remark_' . $index);
                    
                    try {
                        $gestation = new Gestation();
                        $gestation->farm_houses_id = $current_farm;
                        $gestation->mating_id = $mating_id;
                        $gestation->female_id = $female_id;
                        $gestation->gestation_date = $gestation_date;
                        $gestation->babies_number = $babies_number;  
                        $gestation->remark = $remark;
                        
                        $gestation->save();
                    } catch (\Exception $e) {
                        throw $e;
                    }
                }
            } 
        }
        session()->flash('message', 'Enregistrement effectué.');

        return Redirect()->route('gestations');
    }

    public function render()
    {
        return view('pages.gestations', []);
    }

        
// --------------------Gestations List-----------------------------------

    public function getGestatedData (Request $request){


        $female_id = Bunny::where("gender", "female")->where('uid', $request->search)->value('id');       
                
        $gestations = Gestation::where('female_id', $female_id)->get();

        $gestationsDatas = $gestations->map(function($gestation){
            $female_uid = Bunny::where("gender", "female")->where('id', $gestation->female_id)->value('uid');
            $gestation["female_uid"] = $female_uid;
            return $gestation;
        });

        return response()->json(['gestations' => $gestationsDatas]);
        
    }

    public function getGestationData()
    {
        $user = Auth()->user();
        $current_user = getUserId();
        $gestations = Gestation::where('farm_houses_id', intval($current_user))->get();
        $gestationDatas = $gestations->map(function ($gestation) {
            $female_id = Mating::where('id', $gestation->mating_id)->value('female_id');
            $female_uid = Bunny::where("gender", "female")->where('id', $female_id)->pluck('uid');
            $gestation["female_uid"] = $female_uid;
            return $gestation;
        });
        return response()->json(['gestations' => $gestationDatas]);
    }

    public function showGestationDataById(int $id)
    {
        $bunny = Gestation::findOrFail($id);
        $maleParentUid = null;
        $femaleParentUid = null;
        if ($bunny->gestation_id) {
            $gestation = Gestation::find($bunny->gestation_id);
            $maleParentUid = Gestation::find(Gestation::find($gestation->gestation_id)->bunny_male_id)->uid;
            $femaleParentUid = Gestation::find(Gestation::find($gestation->gestation_id)->bunny_female_id)->uid;
        }
        return view('pages.bunny-profile', ['bunny' => $bunny, 'maleUid' => $maleParentUid, 'femaleUid' => $femaleParentUid]);
    }


    public function deleteGestationById(Request $request)
    {
        $bunny = Gestation::findOrFail($request->id);
        $bunny->delete();
        return Redirect::route('list-bunny');
    }

    public function deleteGestationByIdWithAjax(Request $request)
    {
        $gestation = Gestation::findOrFail($request->id);
        $gestation->delete();
        return response()->json(['response' => true]);
    }

    public function editGestationData(EditGestationByidRequest $request)
    {
        if ($request->idGestation) {
            $bunny = Gestation::find($request->idGestation);
            $bunny->uid = $request->uid;
            $bunny->gender = $request->genre;
            $bunny->gender = $request->genre;

        }
        return back();
    }
}
