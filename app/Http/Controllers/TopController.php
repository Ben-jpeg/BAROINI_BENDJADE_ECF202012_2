<?php 
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;


class TopController extends Controller {

    public function topView(){

        // $notes = DB::table('review')->get($id)
         
        // $anime = DB::select("SELECT * FROM animes WHERE id = ?", [$id])[0]; 
        // $rating = DB::select("SELECT rating FROM review WHERE anime_id = ?," [$id]);
        // $rating = DB::table("SELECT ROUND(AVG(rating), 1) as rating, title, cover FROM review 
        // INNER JOIN animes WHERE review.anime_id = animes.id 
        // GROUP BY anime_id ORDER by rating DESC");

        
        // $notesAnimes= DB::table('review')
        //       ->join('animes', 'review.anime_id', '=', 'animes.id')
        //       ->select('title',\DB::raw("avg(rating) as moyenne"), 'description', 'cover', 'anime_id', 'user_id')
        //       ->orderBy('rating', 'desc');
      
        // $notes = DB::table('review')
        //           ->join('users', 'reviews.user_id', '=', 'users.id')
        //           ->select('rating', 'username', 'anime_id')
        //           ->groupBy('anime_id', users)
        


       
        // foreach ($notes as $note) {
            
        //     echo $note->rating;
       
//**************************************** */
        // $avg = Review::avg('rating');
        // // ->groupBy('anime_id','username');
        // dd($avg);
//**************************************** */
    //     $NotesMoyenne = DB::table('review');

    //   $NotesMoyenne->join('animes', 'review.anime_id', '=', 'animes.id');
    // $NotesMoyenne->select('title',\DB::raw("avg(rating) as moyenne"), 'description', 'cover', 'anime_id', 'user_id');
    // $NotesMoyenne->groupBy('anime_id', 'title');
    // $NotesMoyenne->orderBy('moyenne', 'desc');
    // $NotesMoyenne->get();

    //**************************************** */
    //    return view('top', ['animes' => $notesAnimes]);   
        return view('top');       #V
        // ,['moyenne' => $moyenne]
    }
    //**************************************** */

      
//       // $anime = DB::select("SELECT * FROM animes"); 
//       return view('top')->withValue($rating); #V
//     }



}   
?>
