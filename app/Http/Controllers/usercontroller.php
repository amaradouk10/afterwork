<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\utilisateurs;
use App\Mail\testMail;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class usercontroller extends Controller
{
    public function register(){
        return view('inscription');
    }

    public function login(){
        return view('connexion');
    }

    public function create(Request $request){
        $request->validate([
           'nom'=>'required',
           'prenom'=> 'required',
           'mail'=> 'required |unique:utilisateurs',
           'password'=>'required',
           'role'=>'required'
        ]);

        $utilisateurs=new utilisateurs();
        $utilisateurs->nom=$request->nom;
        $utilisateurs->prenom=$request->prenom;
        $utilisateurs->mail=$request->mail;
        $utilisateurs->role=$request->role;
        $utilisateurs->password=Hash::make($request->password);

        $details=[
            'title'=>'Mail from Simplon',
            'body'=>'verification de mail'
        ];
        Mail::to($request->mail)->send(new testMail($details));
        $query= $utilisateurs->save();
        if($query){
            return back()->with('success','compte cree avec success veuillez consultez votre boite mail pour confirmer votre email');

        }else{
            return back()->with('fail','veuillez bien remplir le formulaire');
        }
    }

    public function connexion(Request $request){
        $request->validate([
            'mail'=> 'required',
           'password'=>'required',
           'role'=>'required'
        ]);
        $utilisateurs=utilisateurs::where('mail','=',$request->mail)->first();
        if($utilisateurs){
            if(Hash::check($request->password, $utilisateurs->password)){

               if($utilisateurs=='admin'){
                  return redirect('adminpage');
               }else{
                   return redirect('reserver');
               }
            }else{
                return back()->with('fail','mot de passe incorrect');

            }

        }else{
            return back()->with('fail','compte inexistant');
        }
    }
}
