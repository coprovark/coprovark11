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
    //------------------------------------------------------------------
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
//----------------------------------------------------------------------
        //CO-PROVARK
    //แสดง
    public function co_show(){
        $find = '';        
        $co = DB::table('co_main')
            ->join('co_titlename', 'co_main.main_titleName', '=', 'co_titlename.title_id')
            ->join('co_faculty', 'co_main.main_faculty', '=', 'co_faculty.faculty_id')
            ->select('co_main.*', 'co_titlename.title_name', 'co_faculty.faculty_name')
            ->get();
        return view('page.co_member', [
           'co_show'=>$co,
           'find'=>$find
        ]);
    }
    //ค้นหา
    public function find_co(Request $req){
        $find = $req->find;
        $co = DB::table('co_main')
            ->join('co_titlename', 'co_main.main_titleName', '=', 'co_titlename.title_id')
            ->join('co_faculty', 'co_main.main_faculty', '=', 'co_faculty.faculty_id')
            ->select('co_main.*', 'co_titlename.title_name', 'co_faculty.faculty_name')
            ->where('main_studentCode','like',$find)
            ->get();
       return view('page.co_member',[
           'co_show'=>$co,
           'find'=>$find
        ]);
        return $req;
    }
    //list
    public function list(){
        $titlename = DB::table('co_titlename')->select('*')->get();
        $branch = DB::table('co_branch')->select('*')->get();
        $faculty = DB::table('co_faculty')->select('*')->get();
        $level = DB::table('co_level')->select('*')->get();
        $institution = DB::table('co_institution')->select('*')->get();
        $citizenship = DB::table('co_citizenship')->select('*')->get();
        $nationality = DB::table('co_nationality')->select('*')->get();
        $religion = DB::table('co_religion')->select('*')->get();
        return view('page.co_register',[
            'title'=>$titlename,
            'branch'=>$branch,
            'faculty'=>$faculty,
            'level'=>$level,
            'institution'=>$institution,
            'citizenship'=>$citizenship,
            'nationality'=>$nationality,
            'religion'=>$religion
            ]);
    }
    //รายละเอียด
    public function co_detail(Request $req){
        $id = $req->id;
        // $co = DB::table('co_main')
        //             ->select('*')
        //             ->where('main_id','=',$id)
        //             ->get();
        $co = DB::table('co_main')
            ->join('co_titlename', 'co_main.main_titleName', '=', 'co_titlename.title_id')
            ->join('co_branch', 'co_main.main_branch', '=', 'co_branch.branch_id')
            ->join('co_faculty', 'co_main.main_faculty', '=', 'co_faculty.faculty_id')
            ->join('co_level', 'co_main.main_level', '=', 'co_level.level_id')
            ->join('co_institution', 'co_main.main_institution', '=', 'co_institution.institution_id')
            ->join('co_citizenship', 'co_main.main_citizenship', '=', 'co_citizenship.citizenship_id')
            ->join('co_nationality', 'co_main.main_nationality', '=', 'co_nationality.nationality_id')
            ->join('co_religion', 'co_main.main_religion', '=', 'co_religion.religion_id')
            ->select('co_main.*', 
                'co_titlename.title_name',
                'co_branch.branch_name',                
                'co_faculty.faculty_name',
                'co_level.level_name',
                'co_institution.institution_name',
                'co_citizenship.citizenship_name',
                'co_nationality.nationality_name',
                'co_religion.religion_name')
            ->where('main_id', '=', $id)
            ->get();
        return view('page.co_detail', [
           'detail'=>$co
        ]);
    }    
    //เพิ่ม
    public function co_insert(Request $req){
        $ls = implode(",",$req->STYLE);
        $status = DB::table('co_main')->insert(
          [            
            'main_date'         => $req->DAY,
            'main_tpyeUser'     => $req->TPYEUSER,
            'main_studentCode'  => $req->STUDENTCODE,
            'main_IDcard'       => $req->IDCARD,
            'main_titleName'    => $req->TITLENAME,
            'main_name'         => $req->NAME,
            'main_nickname'     => $req->NICKNAME,
            'main_branch'       => $req->BRANCH,
            'main_faculty'      => $req->FACULTY,
            'main_level'        => $req->LEVEL,
            'main_grade'        => $req->GRADE,
            'main_institution'  => $req->INSTITUTION,
            'main_tpyestudent'  => $req->TPYESTUDENT,
            'main_style'        => $ls,
            'main_birthday'     => $req->BRITHDAY,
            'main_age'          => $req->AGE,
            'main_gender'       => $req->GENDER,
            'main_weigth'       => $req->WEIGHT,
            'main_height'       => $req->HEIGHT,
            'main_blood'        => $req->BLOOD,
            'main_status'       => $req->STATUS,
            'main_citizenship'  => $req->CITIZENSHIP,
            'main_nationality'  => $req->NATIONALITY,
            'main_religion'     => $req->RELIGION,
            'main_perAddress'   => $req->PER_ADDRESS,
            'main_preAddress'   => $req->PRE_ADDRESS,
            'main_phone'        => $req->PHONE,
            'main_mobile'       => $req->MOBILE,
            'main_email'        => $req->E_MAIL,
            'main_facebook'     => $req->FACEBOOK,
            'main_website'      => $req->WEB
          ]
        );
        if($status){
           return redirect('co_member');
        }else{
           return "เกิดข้อผิดพลาด";
        }       
    }
    //ลบ
    public function delete_co($id){
        //พารามิเตอร์ 3 ตัวใน where คือ ฟิล,เปรียบเทียบ,ค่าที่นำมาเปรียบ
        DB::table('co_main')->where('main_id', '=', $id)->delete();
        return redirect('co_member');
    }
    //Edit
    public function co_edit(Request $req){
        $id = $req->id;
        $co = DB::table('co_main')
            ->join('co_titlename', 'co_main.main_titleName', '=', 'co_titlename.title_id')
            ->select('co_main.*', 
                    'co_titlename.title_id')
            ->where('main_id', '=', $id)
            ->get();
        $titlename = DB::table('co_titlename')->select('*')->get();
        return view('page.co_edit', [
            'co'=>$co,
            'title'=>$titlename
        ]);
    }
}