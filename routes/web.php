<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//home 
Route::get('/',['as'=>'home', function () {
    return view('welcome');
}]);

//about page will work  FirstController class show method

Route::get('/about/{id}','FirstController@show'); 

// Route::get('/articles','Admindir\Core1@getArticles');
// Route::get('/article/{id}','Admindir\Core1@getArticle');

Route::get('/articles', ['uses'=> 'Admindir\Core1@getArticles','as'=>'articles']);
Route::get('/article/{page}',['uses'=> 'Admindir\Core1@getArticle','as'=>'article']);


//list pages
Route::get('pages/add','Admindir\CoreResource@add');
Route::resource('/pages','Admindir\CoreResource'); 


// Route::controller('/pages','PagesController', ['getCreate'=>'pages.create']);



//rejrect some methods

////Route::resource('/pages','Admindir\CoreResource',['only'=>['index','show']]); 

// Route::get('/article/{id}',['as'=>'article', function ($id) {
//     echo $id;
// }]);

//Route::get('/articles','ArticlesController@index')

// Route::get('/page/{id}/{cat}', function ($var1,$var2) {
    

//      echo "<pre>";
//      print_r($_ENV);
//      echo "</pre>";
//      echo config('app.locale');
//      echo Config::set('app.locale','ru');
//      echo Config::get('app.locale');
//      echo env('APP_ENV'); echo "<br>";

//      echo $var1.'|'.$var2;

// });

/// parameter dont required, optional parameter
// Route::get('/page/{id?}', function ($var1=null) {

//      echo $var1;

// });

///parameter required with conditions /regular expression/

// Route::get('/page/{id}', function ($var1) {

//      echo $var1;

// })->where('id','[0-9]+');


///1 more parameters required with conditions /regular expression/

// Route::get('/page/{id}/{cat}', function ($var1) {

//      echo $var1;

// })->where(['id'=>'[0-9]+','cat'=>'[A-Za-z]+']);



// Route::group(['prefix'=>'admin'], function() {

//      Route::get('page/create', function(){
//         echo 'page/create';
//      });
    
//      Route::get('page/edit', function(){
//         echo 'page/edit';
//      });
// });


///with required parameter admin 

Route::group(['prefix'=>'admin/{id}'], function() {

     Route::get('page/create/{var}', function($id){
        // echo 'page/create';
        // echo route('home');
         ///return redirect()->route('home');
         /// return redirect()->route('article',array('id'=> 25));
          $route=Route::current();
          echo $route->getName();
         // echo $route->getParameter('var',24);


     })->name('createpage');
    
     Route::get('page/edit', function(){
        echo 'page/edit';
     });
});





Route::post('', function () {
     //return view('welcome');
});


// Route::post('/comments', function () {
//   print_r($_POST);
// });


Route::match(['get','post'],'/comments', function () {
  print_r($_POST);
});



// Route::any('/comments', function () {
//   print_r($_POST);
// });