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
<br>
@if($n == 0 )
    <form action="/gallery_insert" method="post">
        <div class="form-group form-inline">
            <label class="col-sm-1">Gallery</label>
            <input type="text" name="GALLERY" class="form-control" style="width:290px" value="" placeholder="ชื่อ gallery">
            <input type="text" value="{{ date("Y/m/d") }}" name="DAY" hidden>
        </div>        
        <div class="col-sm-1"></div>
        <button type="submit" class="btn btn-success"> Create Gallery</button>
        <a href="/g_gallery">
            <button type="button" class="btn btn-danger"> Cancel</button>
        </a>
    </form>
@elseif($n == 1)
    @foreach($edit as $ed)
    <form action="/gallery_update/{{ $ed->gallery_id }}" method="post">
        <!-- <input type="text" name="ID" value="{{ $ed->gallery_id }}" hidden> -->
        <div class="form-group form-inline">
            <label class="col-sm-1">Gallery</label>
            <input type="text" name="GALLERY" class="form-control" style="width:290px" value="{{ $ed->gallery_name }}">
            <input type="text" value="{{ date("Y/m/d") }}" name="DAY" hidden>
        </div>        
        <div class="col-sm-1"></div>
        <button type="submit" class="btn btn-success"> Edit Gallery</button>
        <a href="/g_gallery">
            <button type="button" class="btn btn-danger"> Cancel</button>
        </a>
    </form>
    @endforeach
@endif

@endsection