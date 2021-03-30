<?php

namespace App\Http\Controllers;

use App\Models\jours;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JourController extends Controller
{
    public function jour(){
        $jours=jours::all();
        return view('adminpage',['jours'=>$jours]);
    }

    public function insertday(Request $request){

        $request->validate([
           'libellejours'=>'required'
        ]);
        $jours=new jours();
        $jours->libellejours=$request->libellejours;
        $query= $jours->save();
        if($query){
            return back()->with('success','jourajouter');
        }else{
            return back()->with('fail','veuillez bien remplir leformulaire');
        }

    }
}
