<?php 
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;


class LogsController extends Controller {

//#3 page de connexion (log in)
  public function login(){
    return view('login'); #V
  }


//#4 page d'inscription (sign up)
   public function signup() {
       return view('signup'); #V
   }

}

?>
