<?php

namespace App\Http\Controllers;
use App\Models\determiner_place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\jours;

class PlaceController extends Controller
{
    public function afficheheure(){
        $determiner_place=determiner_place::all();
        $jours=jours::all();
        return view('reserver',['determiner_place'=>$determiner_place, 'jours'=>$jours ]);
    }

    public function placeinsert(Request $request){
        $idreq=DB::select('select id from jours order by id desc limit 1');
        $jourid='';
        foreach($idreq[0] as $key=>$value){
            $jourid=$value;
        }
        $request->validate([
            'heure'=>'required',
            'place'=>'required'
         ]);
         $determiner_place=new determiner_place();
         $determiner_place->place=$request->place;
         $determiner_place->heure=$request->heure;
         $determiner_place->jour_id=$jourid;
         $query= $determiner_place->save();
         if($query){
            return back()->with('success','ajouter');
        }else{
            return back()->with('fail','veuillez bien remplir leformulaire');
        }
}
}
