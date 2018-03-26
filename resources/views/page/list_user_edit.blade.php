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
