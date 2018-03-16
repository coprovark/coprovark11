@extends('layouts.main')
@section('title', 'สมาชิก')
@section('content')
<br>
<h1>List User</h1>
<hr>
<form class="form-inline" action="/list_users_find" method="post">
    <a href="/form_register">
        <button type="button" class="btn btn-success">เพิ่ม</button>
    </a>
    <div style="float:right">
        <div class="form-group">
            <input type="text" name="find" class="form-control" value="{{ $find }}" placeholder="ค้นหา....">
        </div>
        <button type="submit" class="btn btn-warning">ค้นหา</button>
    </div>
</form>
<br>
<table class="table table-hover" >
    <tr style="background-color:#bfbfbf;">
        <td>ID</td>
        <td>USERNAME</td>
        <td>PASSWORD</td>
        <td>STATUS</td>
        <td></td>
    </tr>
    @foreach($data_list as $item)
    <tr>
        <td>{{ $item->id }}</td>
        <td>{{ $item->username }}</td>
        <td>{{ $item->password }}</td>
        <td>{{ $item->status }}</td>
        <td>
            <button type="button" class="btn btn-danger" onclick="return _confirm('{{ $item->id }}')">ลบ</button>
            <button type="button" class="btn btn-info">แก้ไข</button>
        </td>
    </tr>
    @endforeach
</table>

<script>
    function _confirm(id){
        if(confirm('ยืนยันการลบข้อมูล')){
            window.location.href = 'delete_user/'+id;
                                    //'/delete_user/15';
        }
    }
</script>

@endsection