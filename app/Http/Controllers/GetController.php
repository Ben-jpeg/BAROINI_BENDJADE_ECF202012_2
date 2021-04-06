<?php 

// namespace App\Http\Controllers;
// use Illuminate\Support\Facades\Route;

// class PostController extends Controller {
//     public function critiques(){


//         return view('/anime/{id}/new_review');
//     }
// }

//----------------------------------------------------------------

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Com;
use Illuminate\Database\Eloquent\Model;
use App\Models;
use App\Models\Review;



class GetController extends Controller {

    //page d'accueil
    public function home(){
            $animes = DB::select("SELECT * FROM animes");
            // $animes = Animes::all();
            return view('welcome', ["animes" => $animes]);
    }

      //page de connexion (log in)
    public function login(){
        return view('login');
     
    }
      //page d'inscription (sign up)
    public function signup() {
            return view('signup'); 
    }

    //page d'un seul animé
    public function idAnime($id){
            $anime = DB::select("SELECT * FROM animes WHERE id = ?", [$id])[0];
            return view('anime', ["anime" => $anime]);
       
    }

    //page critiques/reviews
    public function reviews($id){

        //Accéder à la page 'critique de l'anime' uniquement si 
       //connecté, sinon redirigé vers page de connexion (IF/ELSE)
            if (Auth::user()) {
              $anime = DB::select("SELECT * FROM animes WHERE id = ?", [$id])[0]; 
               // J'y ai ajouté la variable anime pour chopper le nom de l'anime sur lequel une critique sera déposé
             // on maintiens la syntaxe avec ? (pour + de sécurité)
               return view('new_review', compact('anime', ["anime" => $anime])); 
            } else {
              return view('login');
            }
    }



    public function addComment(){

      $commentary = request('commentary');

      $leCommentaire = new Review();
      $leCommentaire->comment = $commentary;
      $leCommentaire->save();

      return back();

        // // validation des données
        // $validatedData = $request->validate(["review" => "required"]);
        // // modèle
        // $com = new Com();
        // $com->commentary = $validatedData["review"];
        // $com->save();
        // // ~ vue
        // return redirect('/anime/{id}/new_review');
    }





}



// return view('/anime/{id}/new_review');


// function () {
//     $animes = DB::select("SELECT * FROM animes");
//     return view('welcome', ["animes" => $animes]);
//   });




?>