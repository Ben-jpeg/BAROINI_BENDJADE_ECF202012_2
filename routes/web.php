<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\AnimeController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogsController;
use App\Http\Controllers\TopController;
use App\Models\Review;
use App\Models\User;
use App\Models\Users;
use App\Models\Animes;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;





/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!

//Model      =   M
//Vue        =   V
//Controller =   C
|
*/

//#1 page d'accueil (view)
Route::get('/',[HomeController::class,'home']);  #C


//#2 page d'un seul animé sélectionné (view)
Route::get('/anime/{id}',[AnimeController::class,'idAnime']);  #C


//#3 page de connexion (log in) (view)
Route::get('/login',[LogsController::class,'login']);  #C


//#4 page d'inscription (sign up) (view)
Route::get('/signup',[LogsController::class,'signup']);  #C


//#5a page critique/reviews
Route::get('/anime/{id}/new_review',[ReviewController::class,'reviews']);  #C


//#5b - afficher une page de confirmation lorsque j ai bien déposé une critique (view)
Route::get('/confirmationpost',[ReviewController::class, 'confirmed']); #C


//#5c - ajouter dans la bdd une note & un commentaire 
Route::post('/anime/{id}/new_review',function($id){   #C

  $anime = DB::select("SELECT * FROM animes WHERE id = ?", [$id])[0];   #M
  $commentaire = new App\Models\Review;      #M
  $commentaire->rating = request('rating');
  $commentaire->comment = request('commentary');
  $commentaire->user_id = Auth::user()->id;    #M
  $commentaire->anime_id = $anime->id;
  $commentaire->save();
    
 return redirect('confirmationpost');   #V
});


//#6 pour se connecter avec ses identifiants
Route::post('/login', function (Request $request) {    #C
  $validated = $request->validate([
    "username" => "required",
    "password" => "required",
  ]);
  if (Auth::attempt($validated)) {      
    return redirect()->intended('/');   #V
  }
  return back()->withErrors([
    'username' => 'The provided credentials do not match our records.',
  ]);
});


//#7 pour se créer un nouveau compte
Route::post('signup', function (Request $request) {  #C
  $validated = $request->validate([
    "username" => "required",
    "password" => "required",
    "password_confirmation" => "required|same:password"
  ]);
  $user = new User();   #M
  $user->username = $validated["username"];
  $user->password = Hash::make($validated["password"]);
  $user->save();
  Auth::login($user);     
  return redirect('/'); #V
});


//#8 pour se déconnecter
Route::post('signout', function (Request $request) {   #C
  Auth::logout();
  $request->session()->invalidate();
  $request->session()->regenerateToken();
  return redirect('/');    #V
});


#9 page top (view)
Route::get('top',[TopController::class,'topView']);  #C






























  // function(){
  //   $reviews =  App\Models\Review::all();
  //   return view('/utilisateurs', ['reviews' => $reviews],);
   
  //  });





//GET pour afficher les commentaires !!!!!!!!!
// Route::get('/anime/{id}/new_review',function($id){
            
//   $review = DB::select("SELECT * FROM review WHERE anime_id = ?", [$id])[0];

//   $commentaire = new App\Models\Review;
//   // $commentaire->user_id = Auth::user()->id;
//   $commentaire->rating = $review->rating;
//  