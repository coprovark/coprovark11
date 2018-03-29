<?php

namespace App\Http\Controllers;
use App\file;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller; //สืบทอดคุณสมบัติ
use Illuminate\Routing\UrlGenerator;
//use Illuminate\Support\Facades\DB;//ไลบรารีเชื่อมฐานข้อมูล
use DB;

class FileController extends Controller
{
    //show
    public function show(){
        $query = DB::table('file')->select('*')->get();
        return view('file.upload',[
            'datatable' => $query,
            'edit'      => [],
            'i' => 1
        ]);
    }
    //download
    public function dl(Request $req){
        // return response()->download('upload/'.$req->path);
        return response()->download('upload/'.$req->path,$req->name);
    }
    //delete or remove
    public function rm(Request $req){
        $query = DB::table('file')->where('ID','=',$req->ID)->get();
        foreach($query as $row){
            if(unlink('upload/'.$row->FilePath)){
                DB::table('file')->where('ID','=',$req->ID)->delete();
            }
        }
        return redirect('upload1'); 
    }
    //edit
    public function ed(Request $req){
        $query = DB::table('file')->select('*')->get();
        $edit = DB::table('file')->select('*')->where('ID','=',$req->ID)->get();
        return view('file.upload',[
            'datatable' => $query,
            'edit'      => $edit,
            'i'         => 1
        ]);
    }
    //update
    public function update1(Request $req){
        $file = $req->file('uploadfile');
        $name = $req->uploadfilename;
        $randomeName = rand(1001,9999);
        if ($req->hasFile('uploadfile')) {
            $type = $req->uploadfile->extension();
            $namefile =  $randomeName.'.'.$type;
            $size = $file->getClientSize();
            DB::table('file')
            ->where('ID', $req->ID)
            ->update([
                    'FileName' => $name, 
                    'FileType' => $type, 
                    'FilePath' => $namefile, 
                    'FileSize' => round($size/1024,2) // -> KB 
                    ]);
            $file->move('upload',$namefile);
            echo "upload success";
            return redirect('upload1');
        }else{
            DB::table('file')
                ->where('ID', $req->ID)
                ->update([
                        'FileName' => $req->uploadfilename
                        ]);
            return redirect('upload1');
        }
    }
    //upload
    public function upload(Request $req){

        $file = $req->file('uploadfile');
        $name = $req->uploadfilename;
        $randomeName = rand(1001,9999);
        if ($req->hasFile('uploadfile')) {

            $type = $req->uploadfile->extension();
            $namefile =  $randomeName.'.'.$type;
            $size = $file->getClientSize();
            DB::table('file')->insert(
                [
                    'FileName' => $name, 
                    'FileType' => $type, 
                    'FilePath' => $namefile, 
                    'FileSize' => round($size/1024,2) // -> KB 
                ]
            );
 
            $file->move('upload',$namefile);
            echo "upload success";
            return redirect('upload1');
        }

       # $file->getClientSize()
    }
    

}//end class