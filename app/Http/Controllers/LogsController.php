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
