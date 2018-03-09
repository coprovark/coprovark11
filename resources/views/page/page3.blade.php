@extends('layouts.main')

@section('title', 'Page Title')

@section('content')
<form action="/page" method="post">
        password :
        <input type="password" name="pass">
        <br><br>select :
        <select name="selec">
            <option value="Yes">Yes</option>
            <option value="No">No</option>
        </select>
        <br><br>รายละเอียด : <br>
        <textarea name="area" style="height:100px"></textarea>
        <br><br>
        <input type="submit" value="ส่งค่า">
    </form>
    <hr>
    <h2>แสดงผล</h2>
    Password : {{$PASS}}<br>
    Select : {{$SELEC}}<br>
    Area : {{$AREA}}<br>

@endsection