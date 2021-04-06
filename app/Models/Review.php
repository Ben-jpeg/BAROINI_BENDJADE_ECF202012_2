<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table1 = 'users';
    protected $table2 = 'animes';
    protected $table3 = 'review';
    
    public $timestamps = false;
}
