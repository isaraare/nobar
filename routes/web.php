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


Auth::routes();

Route::get('/', 'HomeController@login');
Route::get('/home', 'HomeController@index')->name('home');

//--------------------  User --------------------------//
Route::resource('user', 'UserController');
Route::get('/show/add', 'UserController@create')->name('show');
//Route::get('/show/add', function () {      //กดเพิ่มไปหน้า create
//    return view('user.create');
//});
Route::get('/update/add', function () {      //กดแก้ไขไปหน้า edit
    return view('user.update');
});
Route::resource('adduser', 'UserController'); //adduser
Route::get('showupdateuser/{id}', 'UserController@show');//get show user to update
Route::post('user/update/{id}', 'UserController@update')->name('user/update');//update user to DB
Route::get('user/delete/{id}','UserController@destroy'); // delete  user
//รูปภาพ หน้า Add User
Route::get('pre-user/{file_path}', function ($file_path) {
    $path = storage_path('app/pre-user/' . $file_path);
    $file = File::get($path);
    return Response::make($file, 200)->header('Content-Type', File::mimeType($path));
});


//--------------------  menu -----------------------------------//
Route::resource('menu', 'MenuController');
Route::get('show/addmenu', 'MenuController@create')->name('show');   //แสดงเมนูที่มีทั้งหมด

Route::get('/update/add', function () {      //กดแก้ไขไปหน้า edit
    return view('menu.update');
});
Route::resource('addmenu', 'MenuController'); //addmenu
Route::get('/show/update/addmenu/{id}', 'MenuController@show');//get show user to update
Route::post('menu/update/{id}', 'MenuController@update')->name('menu/update');//update user to DB





//--------------------  order -----------------------------------//
Route::resource('order', 'OrderController');  //list menu
Route::post('add/order','OrderController@store');  // add order
Route::get('delete/order/{id}','OrderController@destroy');



//js
Route::get('get/data/menu','OrderController@get_data_menu');
Route::get('get/data/order/{id}','OrderController@get_data_order');





