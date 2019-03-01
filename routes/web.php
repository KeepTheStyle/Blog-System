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
use App\Setting;
use App\Post;
use App\Category;
Route::get('/', 'FrontEndController@index')->name('welcome');
Route::get('post/{slug}', 'FrontEndController@singlepost')->name('post.single');
Route::get('tag/{slug}', 'FrontEndController@tag')->name('tag.tag');
Route::get('category/{slug}', 'FrontEndController@category')->name('category.category');
Route::get('/results', function(){
    $post =  \App\Post::where('title','like', '%'.request('query').'%')->get();
    return view('/search')->with('posts',$post)
    ->with('setting', Setting::first())->with('query',request('query'))
    ->with('categories', Category::take(5)->get());
});
Route::post('/test', function(){
    return App\User::find(1)->profile;
});
Route::post('/subscribe', function(){
$email = request('email');
Newsletter::subscribe($email);
Session::flash('success', 'You have successfully subscribed to our newsletter');
return redirect()->back();


});
    Auth::routes();
    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
    Route::group(['prefix' => 'admin', 'middleware' => 'auth'],function(){
    Route::get('/post/create', 'PostController@create')->name('post.create');
    Route::post('/post/store', 'PostController@store')->name('post.store');
    Route::get('/category/create', 'CategoryController@create')->name('category.create');
    Route::post('/category/store', 'CategoryController@store')->name('category.store');
    Route::get('/category/categories', 'CategoryController@index')->name('categories');
    Route::get('/category/delete/{id}', 'CategoryController@destroy')->name('category.delete');
    Route::get('/category/edit/{id}', 'CategoryController@edit')->name('category.edit');
    Route::post('/category/update/{id}', 'CategoryController@update')->name('category.update');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/post/posts', 'PostController@index')->name('posts');
    Route::get('/post/allposts', 'PostController@allposts')->name('allposts');
    Route::get('/post/trashed', 'PostController@trashed')->name('post.trashed');
    Route::get('/allpost/trashed', 'PostController@alltrashed')->name('allpost.trashed');
    Route::get('/post/delete/{id}', 'PostController@destroy')->name('post.delete');
    Route::get('/post/edit/{id}', 'PostController@edit')->name('post.edit');
    Route::get('/post/kill/{id}', 'PostController@kill')->name('post.kill');
    Route::get('/post/restore/{id}', 'PostController@restore')->name('post.restore');
    Route::post('/post/update/{id}', 'PostController@update')->name('post.update');
    Route::get('/tag/create', 'TagController@create')->name('tag.create');
    Route::post('/tag/store', 'TagController@store')->name('tag.store');
    Route::get('/tag/tags', 'TagController@index')->name('tags');
    Route::get('/tag/alltags', 'TagController@alltags')->name('alltags');
    Route::get('/tag/delete/{id}', 'TagController@destroy')->name('tag.delete');
    Route::get('/tag/edit/{id}', 'TagController@edit')->name('tag.edit');
    Route::post('/tag/update/{id}', 'TagController@update')->name('tag.update');
    Route::get('/user/index/', 'UserController@index')->name('user.index');
    Route::get('/user/create/', 'UserController@create')->name('user.create');
    Route::post('/user/create/', 'UserController@store')->name('user.store');
    Route::get('/user/delete/{id}', 'UserController@destroy')->name('user.delete');
    Route::get('/profile/edit', 'ProfileController@create')->name('profile.edit');
    Route::post('/profile/update', 'ProfileController@update')->name('profile.update');
    Route::get('/user/admin/{id}', 'UserController@admin')->name('user.admin')->middleware('admin');
    Route::get('/user/notadmin/{id}', 'UserController@notadmin')->name('user.notadmin');
    Route::get('/setting/edit', 'SettingController@index')->name('setting.edit')->middleware('admin');
    Route::post('/setting/edit/{id}', 'SettingController@update')->name('setting.update')->middleware('admin');
    
   

});