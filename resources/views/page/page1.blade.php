@extends('layouts.main')

@section('title', 'Page Title')

@section('content')
    <p>Page1</p>

    <form action="/page" method="post">
        <input type="text" name="name">
        <input type="hidden" name="hidden" value="0000">
        <br><br>
        <input type="radio" name="radio" value="M">ชาย
        <input type="radio" name="radio" value="F">หญิง
        <br><br>
        <input type="checkbox" name="checkbox" value="Yes">ยอมรับ
        <br><br>
        <input type="submit" value="ส่งค่า">
    </form>

    <h2>แสดงผล<h2>
    Name : {{$NAME}}<br>
    ID : {{$ID}}<br>
    Gender : {{$GEN}}<br>
    Accent : {{$ACCENT}}
    
@endsection