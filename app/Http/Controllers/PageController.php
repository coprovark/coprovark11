<?php

namespace App\Http\Controllers;
//เรียกใช้
use App\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller; //สืบทอดคุณสมบัติ
use Illuminate\Support\Facades\DB;//ไลบรารีเชื่อมฐานข้อมูล

class PageController extends Controller
{
    public function show(Request $request){
        $txt_name = $request->input('name');
        $txt_hidden = $request->input('hidden');
        $txt_radio = $request->input('radio');
        $txt_checkbox = $request->input('checkbox');

        $array = [
            "NAME"  => $txt_name,
            "ID"    => $txt_hidden,
            "GEN"   => $txt_radio,
            "ACCENT" => $txt_checkbox
        ];
        return view('page.page1',$array);
        //echo "Name : ".$txt_name.'<br>'."ID : ".$txt_hidden.'<br>'."Gender : ".$txt_radio.'<br>'."Accept : ".$txt_checkbox;
        //return $radio;
    }
    public function show2(Request $request){
        $txt_pass = $request->input('pass');
        $txt_selec = $request->input('selec');
        $txt_area = $request->input('area');

        $array = [
            "PASS"   => $txt_pass,
            "SELEC"  => $txt_selec,
            "AREA"   => $txt_area
        ];
        return view('page.page3',$array);
    }

    public function ShowLogin(Request $request){
        $txtUser = $request->input('user');
        $txtPassword = $request->input('password');

        $data = ["USER"=>$txtUser,"PASSWORD"=>$txtPassword];
        return view('page.form_login',$data);
    }

    public function form_check_login(Request $req){
        $users = DB::select('select * from users where username = ? and password = ?',
         [$req['username'],$req['password']]);
         return view('page.form_check_login',['users'=>$users]);
    }

    public function form_login(Request $req){
        #ค่าที่รับมา
        $txt_name = $req->input('username');
        $txt_pass = $req->input('password');
        #เงื่อนไขในการทำงาน
        $users = DB::select('select * from users where username = ? and password = ?',
         [$req['username'],$req['password']]);
        foreach($users as $value){
            if($txt_name==$value->username && $txt_pass==$value->password){
                $data['status'] = "true";
            }
        }
        #ส่งค่าไปแสดงผล
        return view('page.form_login',['users'=>$users]);
    }
    // form_login2
    public function form_login2(Request $req){
        $users = DB::table('users')->where([
            ['username','=',$req['username']],
            ['password','='.$req['password']]
        ])->get();
        $name = '';
        foreach($users as $value){
            $name = $value['id'];
        }
        $req['name'] = $name;
     return view('page.form_login',$req);
    }
}