@extends('layouts.main')

<style>
    td{
        border:1px solid #d9d9d9;
    }
</style>
@section('content')

<div class="contianer" style="background:linear-gradient(white,#e6e6e6);">
    <h3> จัดการแกลอรี่</h3>
</div>

<form class="form-inline" action="/Gfind" method="get">
    <div style="float:right">
        <div class="form-group">
            <input type="text" name="FIND" class="form-control" value="{{ $find }}" placeholder="ชื่อ Gallery">
        </div>
        <button type="submit" class="btn btn-warning"><img src="icon/magnifier.png"> ค้นหา</button>
        <a href="/g_gallery_manage">
        <button type="button" class="btn btn-success"><img src="icon/plus.png"> เพิ่ม</button>
    </a>
    </div>
</form>

<table class="table table-hover">
    <tr style="background-color:#bfbfbf; font-weight:bold; text-align:center; width:100%;">
        <td style="width:2%">ลำดับ</td>
        <td style="width:33%">ชื่อ Gallery</td>
        <td style="width:20%">วันที่สร้าง</td>
        <td style="width:20%">วันที่ปรับปรุง</td>
        <td style="width:15%">จำนวนภาพ/ไฟล์</td>
        <td style="width:5%">แก้ไข</td>
        <td style="width:5%">ลบ</td>
    </tr>
    @foreach($gallery as $gal)
    <tr>
        <td style="text-align:center;">{{ $rank++ }}</td>
        <td>{{ $gal->gallery_name }}</td>
        <td style="text-align:center;">{{ $gal->gallery_create }}</td>
        <td style="text-align:center;">{{ $gal->gallery_edit }}</td>
        <td style="text-align:center;">{{ DB::table('g_image')->where('image_gallery','=',$gal->gallery_id)->count() }}</td>
        <td>            
            <a href="{{ url('Gedit/'.$gal->gallery_id) }}">
                <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="แก้ไขข้อมูล">
                    <img src="icon/edit.png">
                </button>
            </a>
        </td>
        <td>
            <button type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="ลบข้อมูล" 
                onclick="return _confirm('{{ $gal->gallery_id }}')">
                <img src="icon/close-cross.png">
            </button>
        </td>
    </tr>
    @endforeach
</table>
@endsection

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
<script>
    function _confirm(id){
        if(confirm('ยืนยันการลบข้อมูล')){
            window.location.href = 'gallery_delete/'+id;
                                    //'/delete_user/15';
        }
    }
</script>