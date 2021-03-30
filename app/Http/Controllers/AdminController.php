<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\utilisateurs;
use Illuminate\Support\Facades\DB;
use App\Mail\testMail;
use Illuminate\Support\Facades\Mail;



class AdminController extends Controller
{
    public function liste(){
        $utilisateurs=utilisateurs::all();
        return view('adminpage',['utilisateurs'=>$utilisateurs]);
    }

     public function validator($id){
        DB::update('update utilisateurs set statut = \'actif\' where id =?', [$id]);
        DB::select('select mail from utilisateurs where id= ?', [$id]);
        $details=[
            'title'=>'Mail from Simplon',
            'body'=>'verification de mail'
        ];
        Mail::to('amaradouk10@gmail.com')->send(new testMail($details));
        return redirect('adminpage');
    }

    public function deletor($id){
        DB::delete('delete from utilisateurs where id=?',[$id]);
        return redirect('adminpage');
    }

}
