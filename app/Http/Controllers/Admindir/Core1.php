<?php

namespace App\Http\Controllers\Admindir;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Core1 extends Controller
{   
	//list materials
    public function getArticles(){
      echo "aaa";
    }

    //list one material
    public function getArticle($id){
       echo "bb";
    }
}
