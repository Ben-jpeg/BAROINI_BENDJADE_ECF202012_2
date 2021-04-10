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
use App\Models\Animes;
use App\Models\Users;
use App\Models\User;



class GetController extends Controller {

//#1 page d'accueil
    public function home(){
            $animes = DB::select("SELECT * FROM animes");
            return view('welcome', ["animes" => $animes]);
    }

//#2 page d'un seul animé sélectionné
    public function idAnime($id){
      $anime = DB::select("SELECT * FROM animes WHERE id = ?", [$id])[0];
      return view('anime', ["anime" => $anime]);
}

//#3 page de connexion (log in)
      public function login(){
        return view('login');
    }

//#4 page d'inscription (sign up)
    public function signup() {
            return view('signup'); 
    }

//#5 page critiques/reviews
    public function reviews($id){
        //Accéder à la page 'critique de l'anime' uniquement si connecté

            if (Auth::user()) {
              $anime = DB::select("SELECT * FROM animes WHERE id = ?", [$id])[0]; 
              $reviews = DB::select("SELECT * FROM review WHERE anime_id = $id");
              // $users = DB::select("SELECT * FROM users, review WHERE review.user_id = users.id");
              // Review::all()
              // dd($review);
          
               //la variable anime sert à chopper l'id de l'anime sur lequel une critique sera déposé
               //la variable review elle me permets d'afficher uniquement les coms en relation avec l'id de l'anime
             // on maintiens la syntaxe avec ? (id = ?, + sécurisé)
               return view('new_review', compact('anime','reviews',['reviews' => $reviews, "anime" => $anime])); 
            } else {
              //si non connecté,redirigé vers page de connexion
              return view('login');
            }
    }

//#5b afficher une page de confirmation lorsque j ai bien déposé une critique
    public function confirmed() {
      return view('confirmationpost');
    }

    public function topView(){
      // $anime = DB::select("SELECT * FROM animes"); 
      return view('top');
    }

    
      // $rating = request('rating');

      // $leCommentaire = new Review();
      // $leCommentaire->comment = $commentary;
      // $leCommentaire->rating = $rating;
      // $leCommentaire->save();

      // return back();

        // // validation des données
        // $validatedData = $request->validate(["review" => "required"]);
        // // modèle
        // $com = new Com();
        // $com->commentary = $validatedData["review"];
        // $com->save();
        // // ~ vue
        // return redirect('/anime/{id}/new_review');
    


    // Controller pour insertion des commentaires si jamais tu trouves une soluce pour qu'il marche
    //*************************************************************** */
    // public function newComment($id){
    //     $commentaire = new Review;
    //     $commentaire->rating = request('rating');
    //     $commentaire->comment = request('commentary');
    //     $commentaire->user_id = request($id);
    //     $commentaire->anime_id = request('anime_id');
    //     $commentaire->save();
    //     return redirect('/anime/{id}/new_review');
    //   }
    //*************************************************************** */




}

?>