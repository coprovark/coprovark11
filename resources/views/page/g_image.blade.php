@extends('layouts.main')

<style>
    td{
        border:1px solid #d9d9d9;
    }
</style>
@section('content')

<div class="contianer" style="background:linear-gradient(white,#e6e6e6);">
    <h3> จัดการรูปภาพ</h3>
</div>

<form class="form-inline" action="/Ifind" method="get">
    <div style="float:right">
        <div class="form-group">
            <input type="text" name="FIND" class="form-control" value="{{ $find }}" placeholder="ชื่อภาพ">
        </div>
        <button type="submit" class="btn btn-warning"><img src="icon/magnifier.png"> ค้นหา</button>
        <a href="/g_image_manage">
        <button type="button" class="btn btn-success"><img src="icon/plus.png"> เพิ่ม</button>
    </a>
    </div>
</form>

<table class="table table-hover">
    <tr style="background-color:#bfbfbf; font-weight:bold; text-align:center; width:100%;">
        <td style="width:1%">ลำดับ</td>
        <td style="width:35%">ชื่อภาพ</td>
        <td style="width:15%">วันที่สร้าง</td>
        <td style="width:15%">วันที่ปรับปรุง</td>
        <td style="width:25%">ชื่อ Gallery</td>
        <td style="width:5%">แก้ไข</td>
        <td style="width:5%">ลบ</td>
    </tr>
    @foreach($image as $img)
    <tr>
        <td style="text-align:center;">{{ $rank++ }}</td>
        <td>{{ $img->image_original }}</td>
        <td style="text-align:center;">{{ $img->image_create }}</td>
        <td style="text-align:center;">{{ $img->image_edit }}</td>
        <td>{{ $img->gallery_name }}</td>
        <td>            
            <a href="{{ url('Iedit/'.$img->image_id) }}">
                <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="แก้ไขข้อมูล">
                    <img src="icon/edit.png">
                </button>
            </a>
        </td>
        <td>
            <button type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="ลบข้อมูล"
                onclick="return _confirm('{{ $img->image_id }}')">
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
            window.location.href = 'image_delete/'+id;
                                    //'/delete_user/15';
        }
    }
</script>