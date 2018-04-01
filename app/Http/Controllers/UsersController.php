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

    //-------นักศึกษา-------------------------------------------
    public function std_show(){
        $find = '';
        $std = DB::table('coprovark_11')->select('*')->get();
       return view('page.std_show',[
           'std_show'=>$std,
           'find'=>$find
        ]);
    }//แสดง
    public function delete_std($id){
        //พารามิเตอร์ 3 ตัวใน where คือ ฟิล,เปรียบเทียบ,ค่าที่นำมาเปรียบ
        DB::table('coprovark_11')->where('id', '=', $id)->delete();
        return redirect('std_show');
    }//ลบ
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
    }//เพิ่ม
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
    }//ค้นหา
    public function list_user_edit(Request $req){
        $find = $req->id;
        $user = DB::table('users')
                    ->select('*')
                    ->where('id','=',$find)
                    ->get();
       return view('page.list_user_edit',[
           'user'=>$user
        ]);
    }//แก้ไข
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
    }//อัพเดทข้อมูล user

    //---------CO-PROVARK--------------------------------------
    public function co_show(){
        $find = '';        
        $co = DB::table('co_main')
            ->join('co_titlename', 'co_main.main_titleName', '=', 'co_titlename.title_id')
            ->join('co_faculty', 'co_main.main_faculty', '=', 'co_faculty.faculty_id')
            ->select('co_main.*', 'co_titlename.title_name', 'co_faculty.faculty_name')
            ->get();
        
        return view('page.co_member', [
           'co_show'=>$co,
           'id'=> 1,
           'find'=>$find
        ]);
    }//แสดง   
    public function find_co(Request $req){
        $find = $req->find;
        $co = DB::table('co_main')
            ->join('co_titlename', 'co_main.main_titleName', '=', 'co_titlename.title_id')
            ->join('co_faculty', 'co_main.main_faculty', '=', 'co_faculty.faculty_id')
            ->select('co_main.*', 'co_titlename.title_name', 'co_faculty.faculty_name')
            ->where('main_studentCode','like', "%$find%")
            ->get();
       return view('page.co_member',[
           'co_show'=>$co,
           'find'=>$find,
           'id' =>1
        ]);
        return $req;
    }//ค้นหา
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
    }//list
    public function co_detail(Request $req){
        $id = $req->id;
        $co = DB::table('co_main')
            ->join('co_picture', 'co_main.main_pic', '=', 'co_picture.pic_name')
            ->join('co_titlename', 'co_main.main_titleName', '=', 'co_titlename.title_id')
            ->join('co_branch', 'co_main.main_branch', '=', 'co_branch.branch_id')
            ->join('co_faculty', 'co_main.main_faculty', '=', 'co_faculty.faculty_id')
            ->join('co_level', 'co_main.main_level', '=', 'co_level.level_id')
            ->join('co_institution', 'co_main.main_institution', '=', 'co_institution.institution_id')
            ->join('co_citizenship', 'co_main.main_citizenship', '=', 'co_citizenship.citizenship_id')
            ->join('co_nationality', 'co_main.main_nationality', '=', 'co_nationality.nationality_id')
            ->join('co_religion', 'co_main.main_religion', '=', 'co_religion.religion_id')
            ->select('co_main.*',
                'co_picture.*',
                'co_titlename.*',
                'co_branch.*',                
                'co_faculty.*',
                'co_level.*',
                'co_institution.*',
                'co_citizenship.*',
                'co_nationality.*',
                'co_religion.*')
            ->where('main_id', '=', $id)
            ->get();
        return view('page.co_detail', [
           'detail'=>$co
        ]);
    }//รายละเอียด
    public function co_insert(Request $req){
        //ข้อมูลรูป-------------------------------------
        $file = $req->file('PICTURE');
        $randomeName = rand(1001,9999);
        if ($req->hasFile('PICTURE')) {
            $type = $req->PICTURE->extension();
            $namefile =  $randomeName.'.'.$type;
            $size = $file->getClientSize();
            DB::table('co_picture')->insert(
                [
                    'pic_name' => $randomeName, 
                    'pic_type' => $type, 
                    'pic_path' => $namefile, 
                    'pic_size' => $size/1024, // -> KB 
                ]
            );
            $file->move('picture',$namefile);
        }
        //ข้อมูล text-----------------------------------
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
            'main_website'      => $req->WEB,
            'main_pic'          => $randomeName
          ]
        );
        if($status){
           return redirect('co_member');
        }else{
           return "เกิดข้อผิดพลาด";
        }       
    }//เพิ่ม
    public function delete_co($id){
        //พารามิเตอร์ 3 ตัวใน where คือ ฟิล,เปรียบเทียบ,ค่าที่นำมาเปรียบ
        DB::table('co_main')->where('main_id', '=', $id)->delete();
        return redirect('co_member');
    }//ลบ
    public function co_edit(Request $req){
        $id = $req->id;
        $co = DB::table('co_main')
            ->join('co_titlename', 'co_main.main_titleName', '=', 'co_titlename.title_id')
            ->join('co_branch', 'co_main.main_branch', '=', 'co_branch.branch_id')
            ->join('co_faculty', 'co_main.main_faculty', '=', 'co_faculty.faculty_id')
            ->join('co_level', 'co_main.main_level', '=', 'co_level.level_id')
            ->join('co_institution', 'co_main.main_institution', '=', 'co_institution.institution_id')
            ->join('co_citizenship', 'co_main.main_citizenship', '=', 'co_citizenship.citizenship_id')
            ->join('co_nationality', 'co_main.main_nationality', '=', 'co_nationality.nationality_id')
            ->join('co_religion', 'co_main.main_religion', '=', 'co_religion.religion_id')
            ->select('*')
            ->where('main_id', '=', $id)
            ->get();
        $titlename = DB::table('co_titlename')->select('*')->get();
        $branch = DB::table('co_branch')->select('*')->get();
        $faculty = DB::table('co_faculty')->select('*')->get();
        $level = DB::table('co_level')->select('*')->get();
        $institution = DB::table('co_institution')->select('*')->get();
        $citizenship = DB::table('co_citizenship')->select('*')->get();
        $nationality = DB::table('co_nationality')->select('*')->get();
        $religion = DB::table('co_religion')->select('*')->get();
        return view('page.co_edit', [
            'co'=>$co,
            'title'=>$titlename,
            'branch'=>$branch,
            'faculty'=>$faculty,
            'level'=>$level,
            'institution'=>$institution,
            'citizenship'=>$citizenship,
            'nationality'=>$nationality,
            'religion'=>$religion
        ]);
    }//Edit
    public function co_update(Request $req){
        $id = $req->ID;
        $ls = implode(",",$req->STYLE);
        $data = [
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
        ];
        $status = DB::table('co_main')
                    ->where('main_id', $id)
                    ->update($data);
        return redirect('co_member');
    }//อัพเดต

    //-------Gallery---------------------------------------
    public function gallery_list(){
        $find = '';
        $gal = DB::table('g_gallery')->select('*')->get();
        return view('page.g_gallery',[
           'gallery'=>$gal,
           'find'   =>$find,
           'rank'   => 1
        ]);
    }//แสดง gallery
    public function gallery_find(Request $req){
        $find = $req->FIND;
        $gal = DB::table('g_gallery')->select('*')->where('gallery_name','like',"%$find%")->get();
        return view('page.g_gallery',[
            'gallery'=>$gal,
            'find'   =>$find,
            'rank'   => 1
        ]);
    }//ค้นหา gallery
    public function gallery_insert(Request $req){
        $status = DB::table('g_gallery')->insert(
        [            
            'gallery_name'  => $req->GALLERY,
            'gallery_create' => $req->DAY
        ]);
        return redirect('g_gallery');
    }//เพิ่ม gallery
    public function gallery(Request $req){
        if($req->ID){
            $edit = DB::table('g_gallery')->select('*')->where('gallery_id','=',$req->ID)->get();
            return view('page.g_gallery_manage',[
                'edit'=> $edit,
                'n' => 1
            ]);
        }
        return view('page.g_gallery_manage',[
            'n'=> 0
        ]);
    }//แก้ไข gallery
    public function gallery_update(Request $req){
        $id = $req->ID;
        $data = [
                'gallery_name'  => $req->GALLERY,
                'gallery_edit'  => $req->DAY
            ];
        DB::table('g_gallery')->where('gallery_id', $id)->update($data);
        return redirect('g_gallery');
    }//อัพเดต gallery
    public function gallery_delete(Request $req){
        $query = DB::table('g_gallery')
            ->join('g_image','g_gallery.gallery_id','g_image.image_gallery')
            ->select('g_gallery.*','g_image.*')
            ->where('gallery_id','=',$req->ID)
            ->get();
        foreach($query as $row){
            unlink('Image/'.$row->image_path);
            DB::table('g_image')->where('image_gallery','=',$row->gallery_id)->delete();
        }
        DB::table('g_gallery')->where('gallery_id','=',$req->ID)->delete();
        return redirect('g_gallery'); 
    }//ลบ gallery และรูปที่อยู่ใน gallery
    
    public function image_list(){
        $find = '';
        $img = DB::table('g_image')
            ->join('g_gallery', 'g_image.image_gallery', '=', 'g_gallery.gallery_id')
            ->select('g_image.*', 'g_gallery.*')
            ->get();
       return view('page.g_image',[
           'image'  =>$img,
           'find'   =>$find,
           'rank'   => 1
        ]);
    }//แสดง image  
    public function image_find(Request $req){
        $find = $req->FIND;
        $img = DB::table('g_image')
            ->join('g_gallery', 'g_image.image_gallery', '=', 'g_gallery.gallery_id')
            ->select('g_image.*', 'g_gallery.*')
            ->where('image_original','like',"%$find%")
            ->get();
       return view('page.g_image',[
           'image'  =>$img,
           'find'   =>$find,
           'rank'   => 1
        ]);
    }//ค้นหา image
    public function image_manage(Request $req){
        $gal = DB::table('g_gallery')->select('*')->get();
        if($req->ID){
            $img = DB::table('g_image')->select('*')->where('image_id','=',$req->ID)->get();
            return view('page.g_image_manage',[
                'gallery'=> $gal,
                'image'  => $img,
                'n'      => 1
             ]);
        }else{
        return view('page.g_image_manage',[
           'gallery'=> $gal,
           'n'      => 0
        ]);
        }
    }//แสดงหน้า เพิ่มหรือแก้ไข image
    public function image_insert(Request $req){
        $file = $req->file('IMAGE');
        // $name = $req->NAME;
        $randomeName = rand(1001,9999);
        if ($req->hasFile('IMAGE')) {
            $type = $req->IMAGE->extension();
            $namefile =  $randomeName.'.'.$type;
            $size = $file->getClientSize();
            $nameOriginal = $file->getClientOriginalName();
            DB::table('g_image')->insert(
                [
                    'image_name'    => $randomeName,
                    'image_original'=> $nameOriginal,
                    'image_create'  => $req->DAY,
                    'image_gallery' => $req->GALLERY,
                    'image_type'    => $type,
                    'image_path'    => $namefile,
                    'image_size'    => round($size/1024,2)
                ]
            );
            $file->move('Image',$namefile);
        }
        return redirect('g_image');
    }//เพิ่ม image
    public function image_update(Request $req){
        $file = $req->file('IMAGE');
        // $name = $req->NAME;
        $randomeName = rand(1001,9999);
        if ($req->hasFile('IMAGE')) {
            $query = DB::table('g_image')->where('image_id','=',$req->ID)->get();
            foreach($query as $row){
                unlink('Image/'.$row->image_path);
            }//ลบรูปเดิมทิ้ง
            $type = $req->IMAGE->extension();
            $namefile =  $randomeName.'.'.$type;
            $size = $file->getClientSize();
            $nameOriginal = $file->getClientOriginalName();
            DB::table('g_image')
                ->where('image_id',$req->ID)
                ->update([
                    'image_name'    => $randomeName,
                    'image_original'=> $nameOriginal,
                    'image_edit'    => $req->DAY,
                    'image_gallery' => $req->GALLERY,
                    'image_type'    => $type,
                    'image_path'    => $namefile,
                    'image_size'    => round($size/1024,2)
                ]);
            $file->move('Image',$namefile);//เพิ่มรูปใหม่
        }else{
            DB::table('g_image')
                ->where('image_id',$req->ID)
                ->update([
                    'image_original'=> $name,
                    'image_edit'    => $req->DAY,
                    'image_gallery' => $req->GALLERY
                ]);
        }
        return redirect('g_image');
    }//อัพเดต image
    public function image_delete(Request $req){
        $query = DB::table('g_image')->where('image_id','=',$req->ID)->get();
        foreach($query as $row){
            if(unlink('Image/'.$row->image_path)){
                DB::table('g_image')->where('image_id','=',$req->ID)->delete();
            }
        }
        return redirect('g_image'); 
    }//ลบ image

}//end class