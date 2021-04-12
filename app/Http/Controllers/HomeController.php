<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;



class HomeController extends Controller {

//#1 page d'accueil
  public function home(){
    $animes = DB::select("SELECT * FROM animes");  #M
    return view('welcome', ["animes" => $animes]); #V
    }

}

?>