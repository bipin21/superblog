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
    return view('public/index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/posts', 'PostController@all_post')->name('all_post');

// Route::get('{anypath}','HomeController@index')->where('path','.*');
Route::group(['middleware' => 'auth'], function () {
//category
    Route::post('/add-category', 'CategoryController@add_category');
    Route::get('/category', 'CategoryController@all_category');
    Route::get('/category/{id}', 'CategoryController@delete_category');
    Route::get('/editcategory/{id}', 'CategoryController@edit_category');
    Route::post('/update-category/{id}', 'CategoryController@update_category');
    Route::get('/deletecategory/{id}', 'CategoryController@selected_category');

//post
    Route::post('/savepost', 'PostController@add_post');
    Route::get('/post', 'PostController@all_post');
    Route::get('/delete/{id}', 'PostController@delete_post');
    Route::get('/post/{id}', 'PostController@edit_post');
    Route::post('/update/{id}', 'PostController@update_post');
});

//blogpost
Route::get('/blogpost','BlogController@get_all_blog_post');
Route::get('/categories','BlogController@get_all_category');
Route::get('/singlepost/{id}','BlogController@getpost_by_id');
Route::get('/categorypost/{id}','BlogController@get_all_post_by_cat_id');
Route::get('/search','BlogController@search_post');
Route::get('/latestpost','BlogController@latestpost');
// categorypost
