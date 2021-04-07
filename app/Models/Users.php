<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    // protected $table1 = 'users';
    // protected $table2 = 'animes';
    protected $table = 'users';
    public $timestamps = false;

    // public function users() {
    //     $this->belongsTo(User::class, 'user_id');
    // }
}
