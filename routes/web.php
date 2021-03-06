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

//------------------------------------------------------
//เชื่อมฐานข้อมูล
Route::get('/form_check_login', function () {
    $data2 = ['users'=>[]];
    return view('page.form_check_login',$data2);
});
Route::post('/form_check_login','PageController@form_check_login');
//++++++++++++++++++
Route::get('/form_login', function () {
    $data3 = ['users'=>[]];
    return view('page.form_login',$data3);
});
Route::post('/form_login','PageController@form_login');
//+++++++++++++++++++
Route::get('/form_login2', function () {
    $array = [
        "username"   => '',
        "name"  => ''
    ];
    return view('page.form_login',$array);
});
Route::post('/form_login2','PageController@form_login2');

//------------------------------------------------
//หน้าสมาชิก
Route::get('/list_users','UsersController@list_users');
//ตรวจสอบว่าส่ง id ไปถูกไหม
Route::get('delete_user/{id}', function ($id) {
    return 'User ='.$id;
});
Route::get('/delete_user/{id}','UsersController@delete_users');//ลบ
Route::get('/form_register_save','UsersController@form_register_save');//เพิ่ม
Route::post('/list_users_find','UsersController@list_users_find');//ค้นหา
Route::get('/list_user_edit/{id}','UsersController@list_user_edit');//แก้ไข
Route::post('/list_user_update','UsersController@list_user_update');//แก้ไข

//----------ข้อมูลนักศึกษา-----------------------------------
//หน้าบันทึกข้อมูลนักศึกษา
Route::get('/std_form', function () {
    return view('page.std_form');
});
//หน้าแสดงข้อมูลนักศึกษา
Route::get('/std_show', function () {
    return view('page.std_show');
});
Route::get('/std_show','UsersController@std_show');//แสดงผลในตาราง
Route::get('/delete_std/{id}','UsersController@delete_std');//ลบ
Route::get('/save_std','UsersController@save_std');//เพิ่ม
Route::post('/find_std','UsersController@find_std');//ค้นหา

//--------CO-PROVARK------------------------------------
Route::get('/co_register', function () {
    return view('page.co_register');
});
Route::get('/co_member', function () {
    return view('page.co_member');
});
Route::get('/co_detail', function () {
    return view('page.co_detail');
});
Route::get('/co_member','UsersController@co_show');//แสดงผลในตาราง
Route::post('/find_co','UsersController@find_co');//ค้นหา
Route::post('/co_insert','UsersController@co_insert');//เพิ่ม
Route::get('/co_register','UsersController@list');//เพิ่ม->แสดง list คำนำหน้า,สาขา
Route::get('/delete_co/{id}','UsersController@delete_co');//ลบ
Route::get('/co_detail/{id}','UsersController@co_detail');//รายละเอียด
Route::get('/co_edit/{id}','UsersController@co_edit');//แก้ไข
Route::post('/co_update','UsersController@co_update');//อัพเดต

//------Upload File-----------------------------------------
// Route::get('/upload1', function () {
//     return view('file.upload');
// });
Route::get('/upload1','FileController@show');//show
Route::post('/upload1','FileController@upload');//upload
Route::get('/dl/{path}/{name}','FileController@dl');//download
Route::get('/rm/{ID}','FileController@rm');//delete
Route::get('/ed/{ID}','FileController@ed');//edit
Route::post('/update1','FileController@update1');//update
Route::post('/api/delete','FileController@deleteItem');//เลือกทั้งหมด

//------Gallery----------------------------------------------
Route::get('/g_gallery','UsersController@gallery_list');//แสดงผลในตาราง Gallery
Route::get('/Gfind','UsersController@gallery_find');//find gallery
Route::get('/g_gallery_manage','UsersController@gallery');//แสดงหน้า เพิ่มหรือแก้ไข Gallery
Route::get('/Gedit/{ID}','UsersController@gallery');//edit gallery
Route::post('/gallery_insert','UsersController@gallery_insert');//insert gallery
Route::post('/gallery_update/{ID}','UsersController@gallery_update');//update gallery
Route::get('/gallery_delete/{ID}','UsersController@gallery_delete');//delete gallery

Route::get('/g_image_manage','UsersController@image_manage');//แสดงหน้า เพิ่มหรือแก้ไข image
Route::get('/Iedit/{ID}','UsersController@image_manage');//edit image
Route::get('/g_image','UsersController@image_list');//แสดงผลในตาราง Image
Route::get('/Ifind','UsersController@image_find');//find Image
Route::post('/image_insert','UsersController@image_insert');//insert image
Route::post('/image_update/{ID}','UsersController@image_update');//update image
Route::get('/image_delete/{ID}','UsersController@image_delete');//delete image

Route::get('/g_show', function(){
    return view('page.g_show');
});
