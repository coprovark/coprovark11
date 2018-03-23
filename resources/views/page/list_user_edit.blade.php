@extends('layouts.main')

@section('content')
<div class="container-fluid" style="background:linear-gradient(white,#e6e6e6);">
    <h3><img src="/icon/notes.png"> กำหนดข้อมูลผู้ใช้งาน</h3>
</div>
<br>
@foreach($user as $users)
<form action="/list_user_update" method="post">
    <!-- รหัสนักศึกษา -->
    <div class="form-group form-inline">
        <label class="col-sm-3">user_code</label>
        <input type="text" value="{{ $users->id }}" class="form-control" style="width:70%" placeholder="รหัสนักศึกษา" name="user_code" >
    </div>

    <div class="form-group form-inline">
        <label class="col-sm-3">user_name</label>
        <input type="text" value="{{ $users->username }}" class="form-control" style="width:70%" placeholder="รหัสนักศึกษา" name="user_name" >
    </div>
    <div class="form-group form-inline">
        <label class="col-sm-3">user_password</label>
        <input type="text" value="{{ $users->password }}" class="form-control" style="width:70%" placeholder="รหัสนักศึกษา" name="user_password" >
    </div>
    <!--ระดับการเข้าถึงข้อมูล-->
    <div class="form-group form-inline">
        <label class="col-sm-3">user_level</label>        
        <select class="form-control" name="user_level">
            <option value="1">Admin</option>
            <option value="2">User</option>
        </select>&nbsp;
    </div>
    <!-- สถานะการใช้งาน -->
    <div class="form-group form-inline">
        <label class="col-sm-3">สถานะการใช้งาน</label>        
        <input type="radio" name="user_enable" value="1" > เปิด &emsp;&emsp;
        <input type="radio" name="user_enable" value="0" > ปิด &emsp;&emsp;
    </div>
    <div class="col-sm-3"></div>
    <button type="submit" class="btn btn-success">บันทึก</button>
    <button type="button" class="btn btn-danger">ยกเลิก</button>
    <br><br>
</form>
@endforeach()
@endsection
<script language="javascript">
function calAge(o){
     var tmp = o.value.split("-");
     var current = new Date();
     var current_year = current.getFullYear();
     document.getElementById("age").value = current_year - tmp[0];
}
</script>
