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

Route::get('/hello', function () {
    return view('hello');
});

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/page1', function () {
    return view('page1');
});

//------------------------------
#ลิ้ง page 3 หน้า จากโฟลเดอร์ layouts, page
Route::get('/page1', function () {
    $array = [
        "NAME"   => "",
        "ID"     => "",
        "GEN"    => "",
        "ACCENT" => ""
    ];
    return view('page.page1', $array);
});

Route::get('/page2', function () {
    return view('page.page2');
});
Route::post('/page','PageController@show2');
Route::get('/page3', function () {
    $array = [
        "PASS"   => "",
        "SELEC"  => "",
        "AREA"   => ""
    ];
    return view('page.page3', $array);
});

Route::get('/page4', function () {
    return view('page.page2');
});

//เชื่อม ไฟล์ PageController
Route::post('/page','PageController@show');
//---------------------------------
Route::get('/page10/{id}', function ($id) {
    $array = [
        "ID" => $id
    ];
    return view('page.page10', $array);
});
//link form.register
Route::get('/form_register', function () {
    return view('page.form_register');
});
//link form.login
Route::post('/page','PageController@ShowLogin');
Route::get('/form_login', function () {
    $data = ["USER"=>"",'PASSWORD'=>""];
    return view('page.form_login',$data);
});