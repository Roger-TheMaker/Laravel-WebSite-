<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //tablename
    //protected $table="posts";
    //primary key
    //protected $primarykey='id';
    //timestamps
    //protected $timestamps=false;
    public function user(){
      return $this->belongsTo('App\User');
    }
}
