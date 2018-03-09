@extends('layouts.main')

@section('title', 'Page Title')

@section('content')
    <form action="/page" method="post">
        ชื่อ<input type="text" name="name">
        <input type="hidden" name="hidden" value="0000">
        <br><br>เพศ
        <input type="radio" name="radio" value="M">ชาย
        <input type="radio" name="radio" value="F">หญิง
        <br><br>
        <input type="checkbox" name="checkbox" value="Yes">ยอมรับ
        <br><br>password
        <input type="password" name="pass">
        <br><br>
        <input type="submit" value="ส่งค่า">
    </form>
    <hr>
    <h2>แสดงผล</h2>
    Name : {{$NAME}}<br>
    ID : {{$ID}}<br>
    Gender : {{$GEN}}<br>
    Accent : {{$ACCENT}}
    
@endsection