<?php

namespace App\Http\Controllers;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;//ไลบรารีเชื่อมฐานข้อมูล

class UsersController extends Controller
{
    public function list_users()
    {
        $users = DB::table('users')->select('*')->get();

       return view('page.list_user',['data_list'=>$users]);
    }
}