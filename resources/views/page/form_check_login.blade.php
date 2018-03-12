<!-- Route       : form_check_login
Controller  : form_check_login
View        : form_check_login.blade.php -->

<form action="/form_check_login" method="post">
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
<hr>
@foreach ($users as $user)
    {{ $user->id }}
@endforeach