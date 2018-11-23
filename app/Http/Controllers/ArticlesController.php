<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticlesController extends Controller
{
    public function index(){
	
	     $articles = Article::select(['id', 'title'])->paginatie(20);
		 return view('articles',compact('articles'));
	}
}
