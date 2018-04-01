@extends('layouts.main')

@section('content')
<style>
    label{
        padding-top:5px;
    }
    input[type=radio]{
        padding-top:5px;
    }
</style>

<div class="container-fluid" style="background:linear-gradient(white,#e6e6e6);">
    <h3><img src="/icon/notes.png"> สมัครสมาชิก</h3>
</div>
<br>
<form action="/co_insert" method="post" enctype="multipart/form-data">
    <div class="form-group form-inline row">
        <label class="col-sm-2">วันที่กรอกข้อมูล</label>
        <input class="form-control form-control-sm" type="text" value="{{ date("Y/m/d") }}" name="DAY" readonly>
    </div>
    <div class="row">
        <label class="col-sm-2">เพิ่มรูปภาพ</label>
        <input type="file" name="PICTURE">
    </div>
    <hr>
    <div class="container-fluid">
        <!-- ประเภทผู้ใช้งาน -->
        <div class="form-group form-inline">
            <label class="col-sm-3">ประเภทผู้ใช้งาน</label>
            <input type="radio" name="TPYEUSER" value="นักเรียน" > นักเรียน &emsp;
            <input type="radio" name="TPYEUSER" value="นักศึกษา" > นักศึกษา &emsp;
            <input type="radio" name="TPYEUSER" value="ครู/อาจารย์" > ครู/อาจารย์ &emsp;
        </div>
        <!-- รหัสนักศึกษา -->
        <div class="form-group form-inline">
            <label class="col-sm-3">รหัสนักศึกษา</label>
            <input type="text" class="form-control" style="width:50%;" placeholder="รหัสนักศึกษา" name="STUDENTCODE" >
        </div>
        <!-- เลขบัตร -->
        <div class="form-group form-inline">
            <label class="col-sm-3">เลขบัตรประชาชน</label>
            <input type="text" class="form-control" style="width:50%;" placeholder="เลขบัตรประชาชน" name="IDCARD" >
        </div>
        <!-- ชื่อ-สกุล -->
        <div class="form-group form-inline">
            <label class="col-sm-3">ชื่อ-สกุล</label>         
            <select class="form-control" name="TITLENAME">
            @foreach($title as $item)
                <option value="{{ $item->title_id }}">{{ $item->title_name }}</option>;
            @endforeach
            </select>         
            <input type="text" class="form-control" style="width:40%;" placeholder="่ชื่อ-สกุล" name="NAME" >
        </div>
        <!-- ชื่อเล่น -->
        <div class="form-group form-inline">
            <label class="col-sm-3">ชื่อเล่น</label>
            <input type="text" class="form-control" style="width:50%;" placeholder="ชื่อเล่น" name="NICKNAME" >
        </div>
        <!-- สาขาวิชา -->
        <div class="form-group form-inline">
            <label class="col-sm-3">สาขาวิชา</label>
            <select class="form-control" style="width:50%" name="BRANCH">
            @foreach($branch as $item)
                <option value="{{ $item->branch_id }}">{{ $item->branch_name }}</option>
            @endforeach
            </select>            
        </div>
        <!-- คณะ -->
        <div class="form-group form-inline">
            <label class="col-sm-3">คณะ</label>        
            <select class="form-control" style="width:50%" name="FACULTY">
            @foreach($faculty as $item)
                <option value="{{ $item->faculty_id }}">{{ $item->faculty_name }}</option>
            @endforeach
            </select>
        </div>
        <!-- ชั้นปี -->
        <div class="form-group form-inline">
            <label class="col-sm-3">ชั้นปี</label>
            <select class="form-control" style="width:50%" name="LEVEL">
            @foreach($level as $item)
                <option value="{{ $item->level_id }}">{{ $item->level_name }}</option>
            @endforeach
            </select>            
        </div>
        <!-- เกรด -->
        <div class="form-group form-inline">
            <label class="col-sm-3">เกรดเฉลี่ย</label>
            <input type="text" class="form-control" style="width:50%;" placeholder="เกรดเฉลี่ย" name="GRADE" >
        </div>
        <!-- สถาบัน -->
        <div class="form-group form-inline">
            <label class="col-sm-3">สถาบันการศึกษา</label>
            <select class="form-control" style="width:50%" name="INSTITUTION">
            @foreach($institution as $item)
                <option value="{{ $item->institution_id }}">{{ $item->institution_name }}</option>            
            @endforeach
            </select>            
        </div>
        <!-- ประเภทนักศึกษา -->
        <div class="form-group form-inline">
            <label class="col-sm-3">ประเภทนักศึกษา</label>
            <input type="radio" name="TPYESTUDENT" value="ปกติ" > ปกติ &emsp;
            <input type="radio" name="TPYESTUDENT" value="กศ.บป." > กศ.บป. &emsp;
            <input type="radio" name="TPYESTUDENT" value="กศ.อศ." > กศ.อศ. &emsp;
        </div>
        <!-- Learning Style -->
        <div class="form-group form-inline">
            <label class="col-sm-3">Learning Style</label>
            <label class="checkbox-inline">
                <input type="checkbox" name="STYLE[]" value="V"> V
            </label>
            <label class="checkbox-inline">
                <input type="checkbox" name="STYLE[]" value="A"> A
            </label>
            <label class="checkbox-inline">
                <input type="checkbox" name="STYLE[]" value="R"> R
            </label>
            <label class="checkbox-inline">
                <input type="checkbox" name="STYLE[]" value="K"> K
            </label>
            <label class="checkbox-inline">
                <input type="checkbox" name="STYLE[]" value="Model"> Model
            </label>
        </div>
        <!-- วันเกิด/อายุ -->
        <div class="form-group form-inline">
            <label class="col-sm-3">วัน เดือน ปีเกิด</label>
            <input class="form-control form-control-sm" type="Date" max="2017-12-31" name="BRITHDAY" id="date" onchange="calAge(this)">        
                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            <label>อายุ(ปี)</label>&emsp;
            <input type="text" class="form-control" style="width:10%" name="AGE" placeholder="อายุ(ปี)" readonly id="AGE">
        </div>
        <!-- เพศ -->
        <div class="form-group form-inline">
            <label class="col-sm-3">เพศ</label>
            <input type="radio" name="GENDER" value="ชาย" > ชาย &emsp;
            <input type="radio" name="GENDER" value="หญิง" > หญิง &emsp;
        </div>
        <!-- น้ำหนัก -->
        <div class="form-group form-inline">
            <label class="col-sm-3">น้ำหนัก</label>
            <input type="text" class="form-control" style="width:50%;" placeholder="น้ำหนัก(กิโลกรัม)" name="WEIGHT" >
        </div>
        <!-- ส่วนสูง -->
        <div class="form-group form-inline">
            <label class="col-sm-3">ส่วนสูง</label>
            <input type="text" class="form-control" style="width:50%;" placeholder="ส่วนสูง(เซนติเมตร)" name="HEIGHT" >
        </div>
        <!-- เลือด -->
        <div class="form-group form-inline">
            <label class="col-sm-3">หมู่เลือด</label>
            <input type="radio" name="BLOOD" value="A" > A &emsp;
            <input type="radio" name="BLOOD" value="B" > B &emsp;
            <input type="radio" name="BLOOD" value="O" > O &emsp;
            <input type="radio" name="BLOOD" value="AB" > AB &emsp;
        </div>
        <!-- สถานะ -->
        <div class="form-group form-inline">
            <label class="col-sm-3">สถานะภาพ</label>
            <input type="radio" name="STATUS" value="โสด" > โสด &emsp;
            <input type="radio" name="STATUS" value="แต่งงาน" > แต่งงาน &emsp;
            <input type="radio" name="STATUS" value="หม้าย" > หม้าย &emsp;
            <input type="radio" name="STATUS" value="หย่าร้าง" > หย่าร้าง &emsp;
        </div>
        <!-- สัญชาติ -->
        <div class="form-group form-inline">
            <label class="col-sm-3">สัญชาติ</label>
            <select class="form-control" style="width:50%" name="CITIZENSHIP">
            @foreach($citizenship as $item)
                <option value="{{ $item->citizenship_id }}">{{ $item->citizenship_name }}</option>
            @endforeach
            </select>            
        </div>
        <!-- เชื้อชาติ -->
        <div class="form-group form-inline">
            <label class="col-sm-3">เชื้อชาติ</label>
            <select class="form-control" style="width:50%" name="NATIONALITY">
            @foreach($nationality as $item)
                <option value="{{ $item->nationality_id }}">{{ $item->nationality_name }}</option>
            @endforeach 
            </select>            
        </div>
        <!-- ศาสนา -->
        <div class="form-group form-inline">
            <label class="col-sm-3">ศาสนา</label>
            <select class="form-control" style="width:50%" name="RELIGION">
            @foreach($religion as $item)
                <option value="{{ $item->religion_id }}">{{ $item->religion_name }}</option>
            @endforeach
            </select>            
        </div>
        <!-- ภูมิลำเนา -->
        <div class="form-group form-inline">
            <label class="col-sm-3">ที่อยู่ตามภูมิลำเนา</label>
            <textarea class="form-control" style="width:50%" rows="4" placeholder="ที่อยู่ตามภูมิลำเนา" name="PER_ADDRESS"></textarea>
        </div>
        <!-- ปัจจุบัน -->
        <div class="form-group form-inline">
            <label class="col-sm-3">ที่อยู่ตามปัจจุบัน</label>
            <textarea class="form-control" style="width:50%" rows="4" placeholder="ที่อยู่ตามปัจจุบัน" name="PRE_ADDRESS"></textarea>
        </div>
        <!-- โทรศัพท์ -->
        <div class="form-group form-inline">
            <label class="col-sm-3">โทรศัพท์</label>
            <input type="text" class="form-control" style="width:50%;" placeholder="โทรศัพท์" name="PHONE" >
        </div>
        <!-- มือถือ -->
        <div class="form-group form-inline">
            <label class="col-sm-3">มือถือ</label>
            <input type="text" class="form-control" style="width:50%;" placeholder="มือถือ" name="MOBILE" >
        </div>
        <!-- e-mail -->
        <div class="form-group form-inline">
            <label class="col-sm-3">E-mail</label>
            <input type="text" class="form-control" style="width:50%;" placeholder="E-mail" name="E_MAIL" >
        </div>
        <!-- Facebook -->
        <div class="form-group form-inline">
            <label class="col-sm-3">Facebook</label>
            <input type="text" class="form-control" style="width:50%;" placeholder="Facebook" name="FACEBOOK" >
        </div>
        <!-- Web -->
        <div class="form-group form-inline">
            <label class="col-sm-3">Web</label>
            <input type="text" class="form-control" style="width:50%;" placeholder="Web" name="WEB" >
        </div>
    </div>
    <br>
    <div class="container-fluid">
    <center>
        <button type="submit" class="btn btn-success">บันทึก</button>
        <a href="/co_member"><button type="button" class="btn btn-danger">ยกเลิก</button><a>
        </center>
    </div>
    <br><br>
</form>


@endsection
<script language="javascript">
function calAge(o){
     var tmp = o.value.split("-");
     var current = new Date();
     var current_year = current.getFullYear();
     document.getElementById("AGE").value = current_year - tmp[0];
}
</script>