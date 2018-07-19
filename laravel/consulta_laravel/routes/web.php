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


Route::get('/', 'IndexController@index')->name('site.index');
Route::get('/restaurants', 'IndexController@restaurants')->name('site.restaurants');

Route::group(['middleware' => 'auth'], function (){
    Route::prefix('admin')->group(function (){
        Route::get('restaurants',           'Admin\RestaurantController@index')->name('restaurant.index');
        Route::get('restaurants/new',       'Admin\RestaurantController@new')->name('restaurant.new');
        Route::post('restaurants/store',    'Admin\RestaurantController@store')->name('restaurant.store');
        Route::get('restaurants/edit/{id}', 'Admin\RestaurantController@edit')->name('restaurant.edit');
        Route::post('restaurants/update/{id}', 'Admin\RestaurantController@update')->name('restaurant.update');
        Route::get('restaurants/remove/{id}', 'Admin\RestaurantController@delete')->name('restaurant.remove');
        Route::get('restaurants/photo/{id}', 'Admin\RestaurantPhotoController@index')->name('restaurant.photo');
        Route::post('restaurants/photo/{id}', 'Admin\RestaurantPhotoController@store')->name('restaurant.photo.save');

    });
});

Route::group(['middleware' => 'auth'], function (){
    Route::prefix('admin')->group(function (){
        Route::get('users',           'Admin\UserController@index')->name('users.index');
        Route::get('users/new',       'Admin\UserController@create')->name('users.create');
        Route::post('users/store',    'Admin\UserController@store')->name('users.store');
        Route::get('users/edit/{id}', 'Admin\UserController@edit')->name('users.edit');
        Route::post('users/update/{id}', 'Admin\UserController@update')->name('users.update');
        Route::get('users/remove/{id}', 'Admin\UserController@destroy')->name('users.remove');
    });
});

Route::group(['middleware' => 'auth'], function (){
    Route::prefix('admin')->group(function (){
        Route::get('menu',           'Admin\MenuController@index')->name('menu.index');
        Route::get('menu/new',       'Admin\MenuController@create')->name('menu.create');
        Route::post('menu/store',    'Admin\MenuController@store')->name('menu.store');
        Route::get('menu/edit/{id}', 'Admin\MenuController@edit')->name('menu.edit');
        Route::post('menu/update/{id}', 'Admin\MenuController@update')->name('menu.update');
        Route::get('menu/remove/{id}', 'Admin\MenuController@destroy')->name('menu.remove');
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('rel', function (){
   $restaurant = \App\Restaurant::find(1);
   print $restaurant->name;
   print "<br/>";
    print "cardapio:";
   foreach ($restaurant->menus as $m){
       print $m->name;
       print $m->price;
   }
});