<?php 

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



class ReviewController extends Controller {

//#5a page critiques/reviews
    public function reviews($id){

     //Accéder à la page 'critique de l'anime' uniquement si connecté
         if (Auth::user()) {   #M
           $anime = DB::select("SELECT * FROM animes WHERE id = ?", [$id])[0]; 
           $reviews = DB::select("SELECT * FROM review WHERE anime_id = $id");
            
          // $users = DB::select("SELECT * FROM users, review WHERE review.user_id = users.id");
          // Review::all()                              #M
          // dd($review);
          
           //la variable anime sert à chopper l'id de l'anime sur lequel une critique sera déposé
           //la variable review elle me permets d'afficher uniquement les coms en relation avec l'id de l'anime
          // on maintiens la syntaxe avec ? (id = ?, + sécurisé)
            return view('new_review', compact('anime','reviews',['reviews' => $reviews, "anime" => $anime])); #V
        } else {
           //si non connecté,redirigé vers page de connexion
          return view('login');
         }
    }


//#5b afficher une page de confirmation lorsque j ai bien déposé une critique
    public function confirmed() {
      return view('confirmationpost'); #V
    }
}