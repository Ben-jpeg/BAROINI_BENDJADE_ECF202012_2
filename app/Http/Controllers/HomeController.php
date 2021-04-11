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


class HomeController extends Controller {

//#1 page d'accueil
  public function home(){
    $animes = DB::select("SELECT * FROM animes");  #M
    return view('welcome', ["animes" => $animes]); #V
    }

}

?>