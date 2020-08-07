<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('home/contact', function () {
//     return view('home.contact');
// });

// Route::get('home/about', function () {
//     return view('home.about');
// });

/*
|----------------------------------------------------------------------------------
| Rouites for PostsController
|----------------------------------------------------------------------------------
*/
    Route::get('posts/{id}/delete', ['uses' => 'PostController@delete' , 'as' => 'posts.delete']);
    Route::resource('posts', 'PostController');
/*
|----------------------------------------------------------------------------------
| Routes for BlogController
|----------------------------------------------------------------------------------
*/
    Route::get('blog', ['as' => 'blog.index', 'uses' => 'BlogController@getIndex']);
    Route::get('blog/{slug}', ['as' =>'blog.single', 'uses' =>'BlogController@getSingle'])->where('slug', '[\w\d\-\_]+');
/*
|----------------------------------------------------------------------------------
| Routes for PagesController
|----------------------------------------------------------------------------------
*/
    Route::get('/', 'PagesController@getIndex');
    Route::get('contact', 'PagesController@getContact');
    Route::post('contact', 'PagesController@postContact');
    Route::get('about', 'PagesController@getAbout');
    Route::get('search', ['as' => 'search.search', 'uses' => 'SearchController@search']);
    Route::get('tagPost', ['as' => 'pages.tagPost', 'uses' => 'PagesController@gettagPost']);
    Route::get('tagPostShow/{id}', ['as' =>'pages.tagPostShow', 'uses' => 'PagesController@gettagPostShow']);
    Route::get('tagSingle/{id}', ['as' => 'pages.tagSingle', 'uses' =>'PagesController@gettagSingle']);
/*
|----------------------------------------------------------------------------------
| Route for Authentication
|----------------------------------------------------------------------------------
*/
    Route::auth();
/*
|----------------------------------------------------------------------------------
| Route for HomeController
|----------------------------------------------------------------------------------
*/
    Route::get('/home', 'HomeController@index');
/*
|----------------------------------------------------------------------------------
| Routes for CategoryController
|----------------------------------------------------------------------------------
*/
    Route::resource('categories', 'CategoryController');
/*
|----------------------------------------------------------------------------------
| Routes for TagController
|----------------------------------------------------------------------------------
*/
    Route::resource('tags', 'TagController');
/*
|----------------------------------------------------------------------------------
| Routes for CommentsController
|----------------------------------------------------------------------------------
*/
  // Route::resource('comments', 'CommentsController');
  Route::post('comments/{post_id}', ['uses' => 'CommentsController@store', 'as' => 'comments.store']);
  Route::get('comments/{id}/edit', ['uses' => 'CommentsController@edit', 'as' => 'comments.edit']);
  Route::put('comments/{id}', ['uses' => 'CommentsController@update', 'as' => 'comments.update']);
  Route::delete('comments/{id}', ['uses' => 'CommentsController@destroy','as' => 'comments.destroy']);
  Route::get('comments/{id}/delete', ['uses' => 'CommentsController@delete', 'as' => 'comments.delete']);
/*
|----------------------------------------------------------------------------------
| Route for SearchsController ( The following search routes are working well )
|----------------------------------------------------------------------------------
*/

// Route::get('/', 'SearchController@index');
// Route::get('search', 'SearchController@search');
/*
|----------------------------------------------------------------------------------
| Route for NoticeController
|----------------------------------------------------------------------------------
*/
  Route::get('notice/{id}/delete', ['uses' => 'NoticeController@delete', 'as' => 'notice.delete']);
  Route::resource('notice', 'NoticeController');
/*
|----------------------------------------------------------------------------------
| Route for NoticeController
|----------------------------------------------------------------------------------
*/
  Route::get('students/{id}/delete', ['uses' => 'StudentsController@delete', 'as'=> 'students.delete']);
  Route::resource('students', 'StudentsController');
/*
|----------------------------------------------------------------------------------
| Route for PDF download
|----------------------------------------------------------------------------------
*/
  Route::get('getPDF', 'PDFController@getPDF');
  Route::get('getNPDF', 'PDFController@getNPDF');
  /*
  |----------------------------------------------------------------------------------
  | Route for Tester
  |----------------------------------------------------------------------------------
  */
  Route::get('tester/{id}/delete', ['uses' =>'TesterController@delete','as' => 'tester.delete' ]);
  Route::resource('tester', 'TesterController');
  /*
  |----------------------------------------------------------------------------------
  | Route for Dashboard
  |----------------------------------------------------------------------------------
  */
  Route::get('admin', 'AdminController@getDashboard');
