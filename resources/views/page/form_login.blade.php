@extends('layouts.main')

@section('content')
<h1 class="page-header">เข้าสู่ระบบ</h1>
<form action="/page" method="post">
    <!-- User -->
    <div class="form-group" style="width:30%">
        <label>User</label>
        <input type="text" class="form-control" placeholder="User" name="user" >
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
<b>Data set</b><br>
    User = Thiw<br>
    Password = 0000<br>
    <br>
<b>Data input</b><br>
    User = {{$USER}}<br>
    Password = {{$PASSWORD}}<br>
    <br>
<h1>
    <?php
        if($USER=='Thiw' && $PASSWORD=='0000'){
            echo "TRUE";
        }else{
            echo "FALSE";
        }
    ?>
</h1>

@endsection