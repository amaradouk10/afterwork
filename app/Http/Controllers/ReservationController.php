<?php

namespace App\Http\Controllers;
use App\Models\reservation;
use App\Models\utilisateurs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\determiner_place;
use PhpParser\Node\Expr\New_;

class ReservationController extends Controller
{
    public function reservaffiche(){
        $reservation=reservation::all();
        $utilisateurs=utilisateurs::all();
        return view('adminpage',['reservation'=>$reservation,'utilisateurs'=>$utilisateurs]);
    }
    public function reservation(Request $request){

        $request->validate([
           'jour'=>'required',
           'heure'=>'required',
           'mail'=>'required'
        ]);
        $reservation=new reservation();
        $determiner_place=new determiner_place();
        $reservation->jour=$request->jour;
        $reservation->mail=$request->mail;
        $reservation->heure=$request->heure;
        $query=$reservation->save();
        if($query){
            return back()->with('success','jourajouter');
        }else{
            return back()->with('fail','veuillez bien remplir leformulaire');
        }

}

    public function deletereserve($id){
    DB::delete('delete from reservations where id=?',[$id]);
    return redirect('adminpage');
}
    public function validereserve($id){
    DB::update('update reservations set statut = \'actif\' where id =?', [$id]);
    return redirect('adminpage');

}
}
