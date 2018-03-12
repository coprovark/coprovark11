@extends('layouts.main')
@section('title', 'สมาชิก')
@section('content')
<br>
<h1>List User</h1>
<hr>
<form class="form-inline">
  <div class="form-group">
    <input type="text" class="form-control" placeholder="ค้นหา....">
  </div>
  <button type="submit" class="btn btn-success">ค้นหา</button>
</form>
<br>
<table class="table table-hover">
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
            <button type="button" class="btn btn-danger">ลบ</button>
            <button type="button" class="btn btn-info">แก้ไข</button>
        </td>
    </tr>
    @endforeach
</table>

@endsection