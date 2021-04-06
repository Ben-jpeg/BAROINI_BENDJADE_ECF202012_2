<?php 
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use App\Models;
use App\Models\User;



class PostController extends Controller {

// public function loginn(Request $request) {
//         $validated = $request->validate([
//           "username" => "required",
//           "password" => "required",
//           "password_confirmation" => "required|same:password"
//         ]);
//         $user = new User();
//         $user->username = $validated["username"];
//         $user->password = Hash::make($validated["password"]);
//         $user->save();
//         Auth::login($user);
      
//         return redirect('/');
      
  
// }

// public function signout($request){
//     Auth::logout();
//   $request->session()->invalidate();
//   $request->session()->regenerateToken();
//   return redirect('/');

// }

// public function addComment()
//     {

// $commentary = request('commentary');
// dd($commentary);

//         // // validation des données
//         // $validatedData = $request->validate(["review" => "required"]);
//         // // modèle
//         // $com = new Com();
//         // $com->commentary = $validatedData["review"];
//         // $com->save();
//         // // ~ vue
//         // return redirect('/anime/{id}/new_review');
//     }







}

?>