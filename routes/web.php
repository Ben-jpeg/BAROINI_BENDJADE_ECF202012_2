<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\GetController;
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
|
*/

//#1 page d'accueil (view)
Route::get('/',[GetController::class,'home']);

//#2 page d'un seul animé sélectionné (view)
Route::get('/anime/{id}',[GetController::class,'idAnime']);

//#3 page de connexion (log in) (view)
Route::get('/login',[GetController::class,'login']);

//#4 page d'inscription (sign up) (view)
Route::get('/signup',[GetController::class,'signup']);

//#5a page critique/reviews
Route::get('/anime/{id}/new_review',[GetController::class,'reviews']);

//#5b - afficher une page de confirmation lorsque j ai bien déposé une critique (view)
Route::get('/confirmationpost',[GetController::class, 'confirmed']);

//#5c - ajouter dans la bdd une note & un commentaire 
Route::post('/anime/{id}/new_review',function($id){

  $anime = DB::select("SELECT * FROM animes WHERE id = ?", [$id])[0];
  $commentaire = new App\Models\Review;
  $commentaire->rating = request('rating');
  $commentaire->comment = request('commentary');
  $commentaire->user_id = Auth::user()->id;
  $commentaire->anime_id = $anime->id;
  $commentaire->save();
    
 return redirect('confirmationpost');

});

//#6 pour se connecter avec ses identifiants
Route::post('/login', function (Request $request) {
  $validated = $request->validate([
    "username" => "required",
    "password" => "required",
  ]);
  if (Auth::attempt($validated)) {
    return redirect()->intended('/');
  }
  return back()->withErrors([
    'username' => 'The provided credentials do not match our records.',
  ]);
});

//#7 pour se créer un nouveau compte
Route::post('signup', function (Request $request) {
  $validated = $request->validate([
    "username" => "required",
    "password" => "required",
    "password_confirmation" => "required|same:password"
  ]);
  $user = new User();
  $user->username = $validated["username"];
  $user->password = Hash::make($validated["password"]);
  $user->save();
  Auth::login($user);

  return redirect('/');
});

//#8 pour se déconnecter
Route::post('signout', function (Request $request) {
  Auth::logout();
  $request->session()->invalidate();
  $request->session()->regenerateToken();
  return redirect('/');
});

Route::get('top',[GetController::class,'topView']);


// Route::get('/anime/{id}/new_review',function(){
//    $reviews = App\Models\Review::all();
//    return view('/anime/{id}/new_review', ['reviews' => $reviews]);
  
// });


  // function(){
  //   $reviews =  App\Models\Review::all();
  //   return view('/utilisateurs', ['reviews' => $reviews],);
   
  //  });


// Route::get('/anime/{id}/new_review', function(){
//   $review = DB::select("SELECT * FROM review");
// // $commentaire->rating = request('rating');
// // $commentaire->comment = request('commentary');
// // $commentaire->user_id = request('user_id')
// });
  



//XXxxXXxxXXxx__--__--__--__--__--__--xxXXxxXXxxXXxxXXxxXX
//GET pour afficher les commentaires !!!!!!!!!
// Route::get('/anime/{id}/new_review',function($id){
            
//   $review = DB::select("SELECT * FROM review WHERE anime_id = ?", [$id])[0];

//   $commentaire = new App\Models\Review;
//   // $commentaire->user_id = Auth::user()->id;
//   $commentaire->rating = $review->rating;
//   $commentaire->comment = $review->comment;
//   $commentaire->anime_id = $review->id;
// return ('/');
   
  // });
//XXxxXXxxXXxx__--__--__--__--__--__--xxXXxxXXxxXXxxXXxxXX

