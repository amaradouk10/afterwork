<?php

use Illuminate\Support\Facades\Route;
use App\Models\jours;
use App\Http\Controllers\usercontroller;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\JourController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\ReservationController;
use App\Models\determiner_place;
use Illuminate\Routing\Router;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('/inscription', function () {
    return view('inscription');
});

Route::get('connexion', function () {
    return view('connexion');
});
Route::get('valide', function () {
    return view('validate');
});
Route::get('annonce', function () {
    return view('annonce');
});
Route::get('reserver', function () {
        $jours=jours::all();
    return view('reserver',['jours'=>$jours]);
});






//Routes faisant appel aux controllers
Route::get('register',[usercontroller::class,'register']);
Route::get('login',[usercontroller::class,'login']);
Route::post('create',[usercontroller::class,'create'])->name('create');
Route::post('connexion', [usercontroller::class, 'connexion'])->name('connexion');
Route::get('adminpage',[AdminController::class,'liste']);
Route::get('validate/{id}',[AdminController::class,'validator']);
Route::get('delete/{id}',[AdminController::class,'deletor']);
Route::get('sendMail',[AdminController::class,'sendMail']);
Route::get('jour',[JourController::class,'jour']);
Route::post('adminpage',[JourController::class,'insertday'])->name('insertday');
Route::post('insert',[PlaceController::class,'placeinsert'])->name('placeinsert');
Route::get('reserver',[PlaceController::class,'afficheheure']);
Route::post('reservation',[ReservationController::class,'reservation'])->name('reservation');
Route::get('adminpage',[ReservationController::class,'reservaffiche']);
Route::get('deletereserve/{id}',[ReservationController::class,'deletereserve']);
Route::get('validereserve/{id}',[ReservationController::class,'validereserve']);






