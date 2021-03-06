@extends('layouts.main')

@section('content')
<h1 class="page-header">เข้าสู่ระบบ</h1>
<form action="/form_login2" method="post">
    <!-- User -->
    <div class="form-group" style="width:30%">
        <label>User</label>
        <input type="text" class="form-control" placeholder="User" name="username" >
    </div>
    <!-- Password -->
    <div class="form-group" style="width:30%">
        <label>Password</label>
        <input type="password" class="form-control" placeholder="Password" name="password" >
    </div>

    <button type="submit" class="btn btn-success">เข้าสู่ระบบ</button>
    <a href="/form_register">
        <button type="button" class="btn btn-info">สมัครสมาชิก</button>
    </a>
</form>

<h1>
username = {{$username}}
</h1>
<h1>
ID = {{ $name }}
</h1>

@endsection