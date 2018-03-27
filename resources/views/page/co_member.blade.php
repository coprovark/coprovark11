@extends('layouts.main')

@section('content')
<style>
    td{
        border:1px solid #d9d9d9;
    }
</style>
<div class="container-fluid" style="background:linear-gradient(white,#e6e6e6);">
    <h3><img src="/icon/notes.png"> สมาชิก</h3>
</div>
<br>

<form class="form-inline" action="/find_co" method="post">
    <a href="/co_register">
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
    <tr style="background-color:#bfbfbf; font-weight:bold; text-align:center; width:100%;">
        <td style="width:2%">ลำดับ</td>
        <td style="width:15%">รหัสนักศึกษา</td>
        <td style="width:25%">ชื่อ-สกุล</td>
        <td style="width:15%">วัน เดือน ปีเกิด</td>
        <td style="width:25%">คณะ</td>
        <td style="width:28%">ดำเนินการ</td>
    </tr>
    @foreach($co_show as $item)
    <tr>
        <td>
            
        </td>
        <td style="text-align:center;">{{ $item->main_studentCode }}</td>
        <td>{{ $item->title_name }}{{ $item->main_name }}</td>
        <td style="text-align:center;">{{ $item->main_birthday}}</td>
        <td>{{ $item->faculty_name }}</td>
        <td>            
            <button type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="ลบข้อมูล" 
                onclick="return _confirm('{{ $item->main_id }}')">
                <img src="icon/close-cross.png">
            </button>
            <a href="/co_edit/{{ $item->main_id }}">
                <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="แก้ไขข้อมูล">
                    <img src="icon/edit.png">
                </button>
            <a>
            <a href="/co_detail/{{ $item->main_id }}">
                <button type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="ดูรายละเอียด">
                    <img src="icon/eye.png">
                </button>
            </a>
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
            window.location.href = 'delete_co/'+id;
                                    //'/delete_user/15';
        }
    }
</script>
@endsection