<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/*
Route::get('/users', function (Request $request){
    //dd($request);
    //dd($request->url());
    //return view('welcome');
    dump($request->nom);
    dump($request->input('nom') ,"nom erreur");
    return ["nom"=>$request->input('nom',"erreur") "erreur" ,"age"=>$request->input('age')];
    //return "hello world";
    //return ["nom"=>$_GET['nom']?? "erreur" ,"age"=>$_GET['age']];
    //dd($request['nom']);

    
});
*/
/*
Route::get("/gestion/{nom}-{id}", function (String $nom, String $id){
    return($nom);
    return($id);
})->where(["nom" => "[A-Za-z0-9\-]+", "id"=>"[0-9]+",]);

*/


//route principal 
Route::get("/gestion/{nom}-{id}", function (String $nom, String $id){
    return [
        "nom" => "=$nom",
        "id" => "=$id"
    ];
})->where(["nom" => "[A-Za-z0-9\-]+", "id"=>"[0-9]+",])->name("gestion.user");


//route pour retourner au principam
//Route::get("/gestion/user-show", function (Request $request){
    //return l'url
    //return $request->url();
   // return ["link" => \route("gestion.user", ["nom"=>"Adom", "id"=>1,])];
//})->name("gestion.user-show");

//fonction permettant de grouper les routes
//il s'agit d'un factorisation en faite

Route::prefix("gestion/")->name("gestion.")->group(function(){
    Route::get("user-show", function (Request $request){
        //return l'url
        //return $request->url();
        return ["link" => \route("gestion.user", ["nom"=>"Adom", "id"=>1,])];
    })->name("user-show");
});