@extends('layouts.main')

@section('content')
<h1 class="page-header">สมัครสมาชิก</h1>
<form action="/form_register_save" medthod="post">
    <div class="form-group">
        <label>ID</label>
        <input type="text" class="form-control" placeholder="ID" name="ID" >
    </div>
    <!-- User -->
    <div class="form-group">
        <label>User name</label>
        <input type="text" class="form-control" placeholder="User name" name="USERNAME" >
    </div>
    <!-- Password -->
    <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" placeholder="Password" name="PASSWORD" >
    </div>

    <select class="form-control" name="STATUS">
        <option value="1">1</option>
        <option value="2">2</option>
    </select>

    <br>
    <button type="submit" class="btn btn-success">บันทึก</button>
    <br><br>
</form>

@endsection