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
        //dd($request->all());
        $current_farm = getUserId();

        $female_uid = $request->female_uid;
        $female_id = intval(Bunny::where("gender", "female")->where("uid", $female_uid)->value('id'));
        $mating_id = intVal(Mating::where('female_id', $female_id)->where('mating_date', $request->mating_date)->value('id'));
      
        if(intval(Palpation::where("mating_id", $mating_id)->value("id"))){

            session()->flash('alrdy_mated', 'Enregistrement non effectué ! 
             Une palpation a déjà été enregistrée pour cet accouplement.
             Vous pouvez la supprimer avant de procéder.');

            return Redirect()->route('palpations');             
        }else{
        
            try {
                $palpation = new Palpation();

                $palpation->farm_houses_id = $current_farm;
                $palpation->mating_id = $mating_id;
                $palpation->palpation_date = $request->palpation_date;
                $palpation->palpation_result = $request->palpation_result;  
                $palpation->comments = $request->remark;

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
                    $female_id = intval(Bunny::where("gender", "female")->where("uid", $female_uid)->value('id'));
                    $mating_id = intVal(Mating::where('female_id', $female_id)->where('mating_date', $request->input('mating_date_' . $index))->value('id'));
                    $date = $request->input('palpation_date_' . $index);
                    $remark = $request->input('remark_' . $index);
                    
                    try {
                        $palpation = new Palpation();
                        $palpation->farm_houses_id = $current_farm;
                        $palpation->mating_id = $mating_id;
                        $palpation->palpation_date = $request->palpation_date;
                        $palpation->palpation_result = $request->palpation_result;  
                        $palpation->comments = $request->remark;
                        
                        $palpation->save();
                    } catch (\Exception $e) {
                        throw $e;
                    }
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

    
// --------------------Palpations List-----------------------------------

    public function getPalpationData()
    {
        $user = Auth()->user();
        $current_user = getUserId();
        $palpations = Palpation::where('farm_houses_id', intval($current_user))->get();
        $palpationDatas = $palpations->map(function ($palpation) {
            $female_id = Mating::where('id', $palpation->mating_id)->value('female_id');
            $female_uid = Bunny::where("gender", "female")->where('id', $female_id)->pluck('uid');
            $palpation["female_uid"] = $female_uid;
            return $palpation;
        });
        return response()->json(['palpations' => $palpationDatas]);
    }

    public function showPalpationDataById(int $id)
    {
        $bunny = Palpation::findOrFail($id);
        $maleParentUid = null;
        $femaleParentUid = null;
        if ($bunny->gestation_id) {
            $gestation = Gestation::find($bunny->gestation_id);
            $maleParentUid = Palpation::find(Palpation::find($gestation->palpation_id)->bunny_male_id)->uid;
            $femaleParentUid = Palpation::find(Palpation::find($gestation->palpation_id)->bunny_female_id)->uid;
        }
        return view('pages.bunny-profile', ['bunny' => $bunny, 'maleUid' => $maleParentUid, 'femaleUid' => $femaleParentUid]);
    }


    public function deletePalpationById(Request $request)
    {
        $bunny = Palpation::findOrFail($request->id);
        $bunny->delete();
        return Redirect::route('list-bunny');
    }

    public function deletePalpationByIdWithAjax(Request $request)
    {
        $palpation = Palpation::findOrFail($request->id);
        $palpation->delete();
        return response()->json(['response' => true]);
    }

    public function editPalpationData(EditPalpationByidRequest $request)
    {
        if ($request->idPalpation) {
            $bunny = Palpation::find($request->idPalpation);
            $bunny->uid = $request->uid;
            $bunny->gender = $request->genre;
            $bunny->gender = $request->genre;

        }
        return back();
    }
}
