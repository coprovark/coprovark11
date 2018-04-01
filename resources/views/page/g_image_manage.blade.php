@extends('layouts.main')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>

<style>
    td{
        border:1px solid #d9d9d9;
    }
</style>
@section('content')

<div class="contianer" style="background:linear-gradient(white,#e6e6e6);">
    <h3> จัดการรูปภาพ</h3>
</div>
<br>
@if($n == 0)
    <form action="/image_insert" method="post" enctype="multipart/form-data">
        <div class="form-group form-inline">
            <label class="col-sm-2">เลือก Gallery</label>        
            <select class="form-control" style="width:290px" name="GALLERY">
            @foreach($gallery as $gal)
                <option value="{{ $gal->gallery_id }}">{{ $gal->gallery_name }}</option>
            @endforeach
            </select>
        </div> 
        <div class="form-group form-inline">
            <label class="col-sm-2">ภาพ/ไฟล์</label>
            <input type="file" name="IMAGE" class="form-control" id="pathphoto" accept="image/*">
        </div>
        
        <div class="contianer" style="border:1px solid #d9d9d9; width:290px; height:300px; margin:0 0 10px 170px">
            <img id="view" style="width:100%;" />
        </div>
        <input type="text" value="{{ date("Y/m/d") }}" name="DAY" hidden>
        <div class="col-sm-2"></div>    
        
        <button type="submit" class="btn btn-success"> Upload</button>
        <a href="/g_image">
            <button type="button" class="btn btn-danger"> Cancel</button>
        </a>
    </form>
@elseif($n == 1)
    @foreach($image as $img)
    <form action="/image_update/{{ $img->image_id }}" method="post" enctype="multipart/form-data">
            <div class="form-group form-inline">
                <label class="col-sm-2">เลือก Gallery</label>        
                <select class="form-control" style="width:290px" name="GALLERY">
                @foreach($gallery as $gal)
                    <option value="{{ $gal->gallery_id }}"<?php if($gal->gallery_id == $img->image_gallery)echo"selected"; ?>>{{ $gal->gallery_name }}</option>
                @endforeach
                </select>
            </div> 
            <div class="form-group form-inline">
                <label class="col-sm-2">ภาพ/ไฟล์</label>
                <input type="file" name="IMAGE" class="form-control" id="pathphoto" accept="image/*">
            </div>
            
            <div class="contianer" style="width:290px; margin:0 0 10px 170px">
                <img id="view" src="{{asset('Image/'.$img->image_path)}}" style="height:300px;" />
            </div>
            <input type="text" value="{{ date("Y/m/d") }}" name="DAY" hidden>
            <div class="col-sm-2"></div>    
            
            <button type="submit" class="btn btn-success"> Edit</button>
            <a href="/g_image">
                <button type="button" class="btn btn-danger"> Cancel</button>
            </a>
        </form>
    @endforeach
@endif
@endsection

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                if(input.files[0].type == 'image/jpeg' || input.files[0].type == 'image/png'){
                    $('#view').attr('src', e.target.result);
                }else{
                    alert('รูปแบบไฟล์ไม่ถูกต้อง');
                    $('#pathphoto').val('');
                    $('#view').attr('src', 'images/icon_blank.png');
                }
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#pathphoto").change(function() {
        readURL(this);
    });
</script>