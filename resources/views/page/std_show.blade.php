@extends('layouts.main')

@section('content')
<style>
    td{
        border:1px solid #d9d9d9;
    }
</style>
<div class="container-fluid" style="background:linear-gradient(white,#e6e6e6);">
    <h3><img src="/icon/notes.png"> ตารางข้อมูล</h3>
</div>
<br>
<form class="form-inline" action="/find_std" method="post">
    <a href="/std_form">
        <button type="button" class="btn btn-success"><img src="icon/plus.png"> เพิ่ม</button>
    </a>
    <div style="float:right">
        <div class="form-group">
            <input type="text" name="find" class="form-control" value="{{ $find }}" placeholder="ใส่รหัสนักศึกษา">
        </div>
        <button type="submit" class="btn btn-warning"><img src="icon/magnifier.png"> ค้นหา</button>
    </div>
</form>
<br>
<table class="table table-hover">
    <tr style="background-color:#bfbfbf; font-weight:bold; text-align:center; width:100%">
        <td style="width:2%"><input class="form-check-input" type="checkbox" value="1"></td>
        <td style="width:15%">รหัสนักศึกษา</td>
        <td style="width:25%">ชื่อ-สกุล</td>
        <td style="width:15%">วัน เดือน ปีเกิด</td>
        <td style="width:25%">สังกัดคณะ</td>
        <td style="width:28%">ดำเนินการ</td>
    </tr>
    @foreach($std_show as $item)
    <tr>
        <td><input class="form-check-input" type="checkbox" value="1"></td>
        <td style="text-align:center;">{{ $item->sid }}</td>
        <td>{{ $item->titleName }}{{ $item->fullName }}</td>
        <td style="text-align:center;">{{ $item->birthDay }}</td>
        <?php
            if($item->facultyID == 1){
                $facultyID = "วิทยาการคอมพิวเตอร์";
            }else if($item->facultyID == 2){
                $facultyID = "ครุศาสตร์";
            }else if($item->facultyID == 3){
                $facultyID = "เกษตรศาสตร์";
            }else if($item->facultyID == 4){
                $facultyID = "มนุษยศาสตร์และสังคมศาสตร์";
            }else if($item->facultyID == 5){
                $facultyID = "พยาบาลศาสตร์";
            }else if($item->facultyID == 6){
                $facultyID = "แพทย์แผนไทยและแพทย์ทางเลือก";
            }else if($item->facultyID == 7){
                $facultyID = "สาธารณสุขศาสตร์";
            }else if($item->facultyID == 8){
                $facultyID = "นิติศาสตร์";
            }else if($item->facultyID == 9){
                $facultyID = "วิทยาศาสตร์";
            }else if($item->facultyID == 10){
                $facultyID = "บริหารธุรกิจและการจัดการ";
            }else{
                $facultyID = "เทคโนโลยีอุตสาหกรรม";
            };
        ?>
        <td>{{ $facultyID }}</td>
        <td>            
            <button type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="ลบข้อมูล" onclick="return _confirm('{{ $item->id }}')">
                <img src="icon/close-cross.png"></button>
            <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="แก้ไขข้อมูล">
                <img src="icon/edit.png"></button>
        </td>
    </tr>
    @endforeach
</table>
<br>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
<script>
    function _confirm(id){
        if(confirm('ยืนยันการลบข้อมูล')){
            window.location.href = 'delete_std/'+id;
                                    //'/delete_user/15';
        }
    }
</script>
@endsection