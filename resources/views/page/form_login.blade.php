@extends('layouts.main')

@section('content')
<h1 class="page-header">เข้าสู่ระบบ</h1>
<form>
    <!-- User -->
    <div class="form-group">
        <label>User</label>
        <input type="text" class="form-control" placeholder="User" name="user" >
    </div>
    <!-- Password -->
    <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" placeholder="Password" name="password" >
    </div>
    <button type="submit" class="btn btn-success">เข้าสู่ระบบ</button>
    <a href="/form_register">
        <button type="button" class="btn btn-info">สมัครสมาชิก</button>
    </a>
</form>

@endsection