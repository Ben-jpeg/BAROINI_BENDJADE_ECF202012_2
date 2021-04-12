<?php 
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

//Model      =   M
//Vue        =   V
//Controller =   C

//****************************************** */


class AnimeController extends Controller {

//#2 page d'un seul animé sélectionné
    public function idAnime($id){
      $anime = DB::select("SELECT * FROM animes WHERE id = ?", [$id])[0];  #M
      $reviews = DB::select("SELECT * FROM review WHERE anime_id = $id");  #M
      // $ratingAverage= Review::avg('rating');
      // $average = DB::select("SELECT AVG(rating) FROM review WHERE anime_id = $id");  #M
      return view('anime', compact('anime','reviews', ['reviews' => $reviews, "anime" => $anime])); #V
    }

}

?>