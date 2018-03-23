<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;//ไลบรารีเชื่อมฐานข้อมูล

class UsersController extends Controller
{
    public function list_users(){
        $find = '';
        $users = DB::table('users')->select('*')->get();
       return view('page.list_user',[
           'data_list'=>$users,
           'find'=>$find
        ]);
    }

    public function list_users_find(Request $req){
        $find = $req->find;
        $users = DB::table('users')
                    ->select('*')
                    ->where('id','=',$find)
                    ->get();
       return view('page.list_user',[
           'data_list'=>$users,
           'find'=>$find
        ]);
        return $req;
    }

    public function delete_users($id){
        //พารามิเตอร์ 3 ตัวใน where คือ ฟิล,เปรียบเทียบ,ค่าที่นำมาเปรียบ
        DB::table('users')->where('id', '=', $id)->delete();
        return redirect('list_users');
    }

    public function form_register_save(Request $req){

        $status = DB::table('users')->insert(
          [
            'id'      => $req->ID,
            'username'=> $req->USERNAME,
            'password'=> $req->PASSWORD,
            'status'  => $req->STATUS
          ]
        );
        if($status){
           return redirect('list_users');
        }else{
           return "เกิดข้อผิดพลาด";
        }       
    }
    //------------------------------------------------
        //นักศึกษา
    //แสดง
    public function std_show(){
        $find = '';
        $std = DB::table('coprovark_11')->select('*')->get();
       return view('page.std_show',[
           'std_show'=>$std,
           'find'=>$find
        ]);
    }
    //ลบ
    public function delete_std($id){
        //พารามิเตอร์ 3 ตัวใน where คือ ฟิล,เปรียบเทียบ,ค่าที่นำมาเปรียบ
        DB::table('coprovark_11')->where('id', '=', $id)->delete();
        return redirect('std_show');
    }
    //เพิ่ม
    public function save_std(Request $req){
        $status = DB::table('coprovark_11')->insert(
          [            
            'sid'       => $req->StdID,
            'titleName' => $req->TitleName,
            'fullName'  => $req->FullName,
            'gender'    => $req->Gender,
            'birthDay'  => $req->Birthday,
            'facultyID' => $req->FacultyID,
            'majorID'   => $req->MajorID,
            'address'   => $req->Address,
            'mobile'    => $req->Mobile,
            'food1'     => $req->Food1,
            'food2'     => $req->Food2,
            'food3'     => $req->Food3,
            'food4'     => $req->Food4,
            'username'  => $req->Username,
            'password'  => $req->Password
          ]
        );
        if($status){
           return redirect('std_show');
        }else{
           return "เกิดข้อผิดพลาด";
        }       
    }
    //ค้นหา
    public function find_std(Request $req){
        $find = $req->find;
        $std = DB::table('coprovark_11')
                    ->select('*')
                    ->where('sid','=',$find)
                    ->get();
       return view('page.std_show',[
           'std_show'=>$std,
           'find'=>$find
        ]);
        return $req;
    }
    //แก้ไข
    public function list_user_edit(Request $req){
        $find = $req->id;
        $user = DB::table('users')
                    ->select('*')
                    ->where('id','=',$find)
                    ->get();
       return view('page.list_user_edit',[
           'user'=>$user
        ]);
    }
     //อัพเดทข้อมูล user
     public function list_user_update(Request $req){
        $user_code      = $req->user_code;
        $user_name      = $req->user_name;
        $user_password  = $req->user_password;
        $data = [
            'username'=>$user_name,
            'password'=>$user_password,
        ];
        $status = DB::table('users')
                    ->where('id', $user_code)
                    ->update($data);
        return redirect('list_users');
    }
//------------------------------------------------
    //CO-PROVARK
    public function co_show(){
        $find = '';
        $co = DB::table('co_main')->select('*')->get();
       return view('page.co_member',[
           'co_show'=>$co,
           'find'=>$find
        ]);
    }
}