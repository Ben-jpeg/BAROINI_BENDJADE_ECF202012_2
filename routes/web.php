<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\GetController;
use App\Models\User;




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

Route::get('/',[GetController::class,'home']);

// Route::get('/', function () {
//   $animes = DB::select("SELECT * FROM animes");
//   return view('welcome', ["animes" => $animes]);
// });

//page d'un seul animé sélectionné
Route::get('/anime/{id}',[GetController::class,'idAnime']);



//page critique/reviews
Route::get('/anime/{id}/new_review',[GetController::class,'reviews']);


//page de connexion (log in)
Route::get('/login',[GetController::class,'login']);


//pour se connecter avec ses identifiants
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


//page d'inscription (sign up)
Route::get('/signup',[GetController::class,'signup']);



// Route::post('signup',[PostController::class,'loginn']);

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


// Route::post('signout',[PostController::class,'signout']);
Route::post('signout', function (Request $request) {
  Auth::logout();
  $request->session()->invalidate();
  $request->session()->regenerateToken();
  return redirect('/');
});

//xxXXxxXXxxXXxxXXxxXXXxxXXxxxXXxxXXxxXXxxXXxxXXxxXXxxXXxxXXxxxxxxxxxxxxxxxx

// Route::post('/anime/{id}/new_review', function ($request){
//   $anime = DB::select("SELECT * FROM animes WHERE id = ?", [$id])[0];

// });
//xxXXxxXXxxXXxxXXxxXXXxxXXxxxXXxxXXxxXXxxXXxxXXxxXXxxXXxxXXxxxxxxxxxxxxxxxx

Route::post('/anime/{id}/new_review',[GetController::class,'addComment']);