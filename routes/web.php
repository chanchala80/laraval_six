<?php

use Illuminate\Support\Facades\Route;



//Route::get('/', function () {
    //return view('pages.index');
//});

Route::get('/','indexcontroller@index');

Route::get('contact/us', 'hellowcontroller@contact')->name('contact');
Route::get('about/us', 'hellowcontroller@about')->name('about');


/*Category crud here---------------*/

Route::get('all/category', 'hellowcontroller@allcategory')->name('all.category');
Route::get('add/category', 'hellowcontroller@addcategory')->name('add.category');
Route::post('store/category', 'hellowcontroller@storecategory')->name('store.category');
Route::get('view/category/{id}', 'hellowcontroller@viewcategory');
Route::get('delete/category/{id}', 'hellowcontroller@deletecategory');
Route::get('edit/category/{id}', 'hellowcontroller@editcategory');
Route::post('update/category/{id}', 'hellowcontroller@updatecategory');

/*Post crud here---------------*/

Route::post('store/post', 'PostController@storepost')->name('store.post');
Route::get('write/post', 'PostController@writepost')->name('write.post');
Route::get('all/post', 'PostController@allpost')->name('all.post');
Route::get('view/post/{id}', 'PostController@viewpost');
Route::get('delete/post/{id}', 'PostController@deletepost');
Route::get('edit/post/{id}', 'PostController@editpost');
Route::post('update/post/{id}', 'PostController@updatepost');
//Route::get('delete/post/{id}', 'PostController@deletepost');



