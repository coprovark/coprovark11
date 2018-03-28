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
    <h3><img src="/icon/notes.png"> แก้ไขข้อมูลสมัครสมาชิก</h3>
</div>
<br>
@foreach($co as $edit)
<form action="/co_update" method="post">
    <input type="hidden" name="ID" value="{{ $edit->main_id }}">
    <div class="form-group form-inline">
        <label>วันที่แก้ไขข้อมูล</label>
        <input class="form-control form-control-sm" type="text" value="{{ date("Y/m/d") }}" name="DAY" readonly>
    </div>
    <hr>
    <div class="container-fluid">
        <!-- ประเภทผู้ใช้งาน -->
        <div class="form-group form-inline">
            <label class="col-sm-3">ประเภทผู้ใช้งาน</label>
            <input type="radio" name="TPYEUSER" value="นักเรียน" <?php if($edit->main_tpyeUser == 'นักเรียน') echo "checked"; ?>> นักเรียน &emsp;
            <input type="radio" name="TPYEUSER" value="นักศึกษา" <?php if($edit->main_tpyeUser == 'นักศึกษา') echo "checked"; ?>> นักศึกษา &emsp;
            <input type="radio" name="TPYEUSER" value="ครู/อาจารย์" <?php if($edit->main_tpyeUser == 'ครู/อาจารย์') echo "checked"; ?>> ครู/อาจารย์ &emsp;
        </div>
        <!-- รหัสนักศึกษา -->
        <div class="form-group form-inline">
            <label class="col-sm-3">รหัสนักศึกษา</label>
            <input type="text" class="form-control" style="width:50%;" value="{{ $edit->main_studentCode }}" placeholder="รหัสนักศึกษา" name="STUDENTCODE" >
        </div>
        <!-- เลขบัตร -->
        <div class="form-group form-inline">
            <label class="col-sm-3">เลขบัตรประชาชน</label>
            <input type="text" class="form-control" style="width:50%;" value="{{ $edit->main_IDcard }}" placeholder="เลขบัตรประชาชน" name="IDCARD" >
        </div>
        <!-- ชื่อ-สกุล -->
        <div class="form-group form-inline">
            <label class="col-sm-3">ชื่อ-สกุล</label>         
            <select class="form-control" name="TITLENAME">
            @foreach($title as $item)
                <option value="{{ $item->title_id }}"<?php if($item->title_id == $edit->title_id) echo "selected";?>>{{ $item->title_name }}</option>;
            @endforeach
            </select>         
            <input type="text" class="form-control" style="width:40%;" value="{{ $edit->main_name }}" placeholder="่ชื่อ-สกุล" name="NAME" >
        </div>
        <!-- ชื่อเล่น -->
        <div class="form-group form-inline">
            <label class="col-sm-3">ชื่อเล่น</label>
            <input type="text" class="form-control" style="width:50%;" value="{{ $edit->main_nickname }}" placeholder="ชื่อเล่น" name="NICKNAME" >
        </div>
        <!-- สาขาวิชา -->
        <div class="form-group form-inline">
            <label class="col-sm-3">สาขาวิชา</label>
            <select class="form-control" style="width:50%" name="BRANCH">
            @foreach($branch as $item)
            <option value="{{ $item->branch_id }}"<?php if($item->branch_id == $edit->branch_id) echo "selected";?>>{{ $item->branch_name }}</option>;
            @endforeach
            </select>            
        </div>
        <!-- คณะ -->
        <div class="form-group form-inline">
            <label class="col-sm-3">คณะ</label>        
            <select class="form-control" style="width:50%" name="FACULTY">
            @foreach($faculty as $item)
            <option value="{{ $item->faculty_id }}"<?php if($item->faculty_id == $edit->faculty_id) echo "selected";?>>{{ $item->faculty_name }}</option>;
            @endforeach
            </select>
        </div>
        <!-- ชั้นปี -->
        <div class="form-group form-inline">
            <label class="col-sm-3">ชั้นปี</label>
            <select class="form-control" style="width:50%" name="LEVEL">
            @foreach($level as $item)
            <option value="{{ $item->level_id }}"<?php if($item->level_id == $edit->level_id) echo "selected";?>>{{ $item->level_name }}</option>;
            @endforeach
            </select>            
        </div>
        <!-- เกรด -->
        <div class="form-group form-inline">
            <label class="col-sm-3">เกรดเฉลี่ย</label>
            <input type="text" class="form-control" style="width:50%;" value="{{ $edit->main_grade }}" placeholder="เกรดเฉลี่ย" name="GRADE" >
        </div>
        <!-- สถาบัน -->
        <div class="form-group form-inline">
            <label class="col-sm-3">สถาบันการศึกษา</label>
            <select class="form-control" style="width:50%" name="INSTITUTION">
            @foreach($institution as $item)
            <option value="{{ $item->institution_id }}"<?php if($item->institution_id == $edit->institution_id) echo "selected";?>>{{ $item->institution_name }}</option>;
            @endforeach
            </select>            
        </div>
        <!-- ประเภทนักศึกษา -->
        <div class="form-group form-inline">
            <label class="col-sm-3">ประเภทนักศึกษา</label>
            <input type="radio" name="TPYESTUDENT" value="ปกติ" <?php if($edit->main_tpyestudent == 'ปกติ') echo "checked"; ?>> ปกติ &emsp;
            <input type="radio" name="TPYESTUDENT" value="กศ.บป." <?php if($edit->main_tpyestudent == 'กศ.บป.') echo "checked"; ?>> กศ.บป. &emsp;
            <input type="radio" name="TPYESTUDENT" value="กศ.อศ." <?php if($edit->main_tpyestudent == 'กศ.อศ.') echo "checked"; ?>> กศ.อศ. &emsp;
        </div>
        <!-- Learning Style -->
        <div class="form-group form-inline">
            <label class="col-sm-3">Learning Style</label>
        <?php 
            $ls = $edit->main_style;
            $arr = explode(",",$ls);
        ?>
            <label class="checkbox-inline"><input type="checkbox" name="STYLE[]" value="V" <?php foreach($arr as $value){if($value == 'V') echo "checked";} ?>> V</label>
            <label class="checkbox-inline"><input type="checkbox" name="STYLE[]" value="A" <?php foreach($arr as $value){if($value == 'A') echo "checked";} ?>> A</label>
            <label class="checkbox-inline"><input type="checkbox" name="STYLE[]" value="R" <?php foreach($arr as $value){if($value == 'R') echo "checked";} ?>> R</label>
            <label class="checkbox-inline"><input type="checkbox" name="STYLE[]" value="K" <?php foreach($arr as $value){if($value == 'K') echo "checked";} ?>> K</label>
            <label class="checkbox-inline"><input type="checkbox" name="STYLE[]" value="Model" <?php foreach($arr as $value){if($value == 'Model') echo "checked";} ?>> Model</label>        
        </div>
        <!-- วันเกิด/อายุ -->
        <div class="form-group form-inline">
            <label class="col-sm-3">วัน เดือน ปีเกิด</label>
            <input class="form-control form-control-sm" type="Date" name="BRITHDAY" value="{{ $edit->main_birthday }}" id="date" onchange="calAge(this)">        
                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            <label>อายุ(ปี)</label>&emsp;
            <input type="text" class="form-control" style="width:10%" name="AGE" value="{{ $edit->main_age }}" placeholder="อายุ(ปี)" readonly id="AGE">
        </div>
        <!-- เพศ -->
        <div class="form-group form-inline">
            <label class="col-sm-3">เพศ</label>
            <input type="radio" name="GENDER" value="ชาย" <?php if($edit->main_gender == 'ชาย') echo "checked"; ?>> ชาย &emsp;
            <input type="radio" name="GENDER" value="หญิง" <?php if($edit->main_gender == 'หญิง') echo "checked"; ?>> หญิง &emsp;
        </div>
        <!-- น้ำหนัก -->
        <div class="form-group form-inline">
            <label class="col-sm-3">น้ำหนัก</label>
            <input type="text" class="form-control" style="width:50%;" value="{{ $edit->main_weigth }}" placeholder="น้ำหนัก(กิโลกรัม)" name="WEIGHT" >
        </div>
        <!-- ส่วนสูง -->
        <div class="form-group form-inline">
            <label class="col-sm-3">ส่วนสูง</label>
            <input type="text" class="form-control" style="width:50%;" value="{{ $edit->main_height }}" placeholder="ส่วนสูง(เซนติเมตร)" name="HEIGHT" >
        </div>
        <!-- เลือด -->
        <div class="form-group form-inline">
            <label class="col-sm-3">หมู่เลือด</label>
            <input type="radio" name="BLOOD" value="A" <?php if($edit->main_blood == 'A') echo "checked"; ?>> A &emsp;
            <input type="radio" name="BLOOD" value="B" <?php if($edit->main_blood == 'B') echo "checked"; ?>> B &emsp;
            <input type="radio" name="BLOOD" value="O" <?php if($edit->main_blood == 'O') echo "checked"; ?>> O &emsp;
            <input type="radio" name="BLOOD" value="AB" <?php if($edit->main_blood == 'AB') echo "checked"; ?>> AB &emsp;
        </div>
        <!-- สถานะ -->
        <div class="form-group form-inline">
            <label class="col-sm-3">สถานะภาพ</label>
            <input type="radio" name="STATUS" value="โสด" <?php if($edit->main_status == 'โสด') echo "checked"; ?>> โสด &emsp;
            <input type="radio" name="STATUS" value="แต่งงาน" <?php if($edit->main_status == 'แต่งงาน') echo "checked"; ?>> แต่งงาน &emsp;
            <input type="radio" name="STATUS" value="หม้าย" <?php if($edit->main_status == 'หม้าย') echo "checked"; ?>> หม้าย &emsp;
            <input type="radio" name="STATUS" value="หย่าร้าง" <?php if($edit->main_status == 'หย่าร้าง') echo "checked"; ?>> หย่าร้าง &emsp;
        </div>
        <!-- สัญชาติ -->
        <div class="form-group form-inline">
            <label class="col-sm-3">สัญชาติ</label>
            <select class="form-control" style="width:50%" name="CITIZENSHIP">
            @foreach($citizenship as $item)
            <option value="{{ $item->citizenship_id }}"<?php if($item->citizenship_id == $edit->citizenship_id) echo "selected";?>>{{ $item->citizenship_name }}</option>;
            @endforeach
            </select>            
        </div>
        <!-- เชื้อชาติ -->
        <div class="form-group form-inline">
            <label class="col-sm-3">เชื้อชาติ</label>
            <select class="form-control" style="width:50%" name="NATIONALITY">
            @foreach($nationality as $item)
            <option value="{{ $item->nationality_id }}"<?php if($item->nationality_id == $edit->nationality_id) echo "selected";?>>{{ $item->nationality_name }}</option>;
            @endforeach
            </select>            
        </div>
        <!-- ศาสนา -->
        <div class="form-group form-inline">
            <label class="col-sm-3">ศาสนา</label>
            <select class="form-control" style="width:50%" name="RELIGION">
            @foreach($religion as $item)
            <option value="{{ $item->religion_id }}"<?php if($item->religion_id == $edit->religion_id) echo "selected";?>>{{ $item->religion_name }}</option>;
            @endforeach
            </select>            
        </div>
        <!-- ภูมิลำเนา -->
        <div class="form-group form-inline">
            <label class="col-sm-3">ที่อยู่ตามภูมิลำเนา</label>
            <textarea class="form-control" style="width:50%" rows="4" placeholder="ที่อยู่ตามภูมิลำเนา" name="PER_ADDRESS">{{ $edit->main_perAddress }}</textarea>
        </div>
        <!-- ปัจจุบัน -->
        <div class="form-group form-inline">
            <label class="col-sm-3">ที่อยู่ตามปัจจุบัน</label>
            <textarea class="form-control" style="width:50%" rows="4" placeholder="ที่อยู่ตามปัจจุบัน" name="PRE_ADDRESS">{{ $edit->main_preAddress }}</textarea>
        </div>
        <!-- โทรศัพท์ -->
        <div class="form-group form-inline">
            <label class="col-sm-3">โทรศัพท์</label>
            <input type="text" class="form-control" style="width:50%;" value="{{ $edit->main_phone }}" placeholder="โทรศัพท์" name="PHONE" >
        </div>
        <!-- มือถือ -->
        <div class="form-group form-inline">
            <label class="col-sm-3">มือถือ</label>
            <input type="text" class="form-control" style="width:50%;" value="{{ $edit->main_mobile }}" placeholder="มือถือ" name="MOBILE" >
        </div>
        <!-- e-mail -->
        <div class="form-group form-inline">
            <label class="col-sm-3">E-mail</label>
            <input type="text" class="form-control" style="width:50%;" value="{{ $edit->main_email }}" placeholder="E-mail" name="E_MAIL" >
        </div>
        <!-- Facebook -->
        <div class="form-group form-inline">
            <label class="col-sm-3">Facebook</label>
            <input type="text" class="form-control" style="width:50%;" value="{{ $edit->main_facebook }}" placeholder="Facebook" name="FACEBOOK" >
        </div>
        <!-- Web -->
        <div class="form-group form-inline">
            <label class="col-sm-3">Web</label>
            <input type="text" class="form-control" style="width:50%;" value="{{ $edit->main_website }}" placeholder="Web" name="WEB" >
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
@endforeach()

@endsection
<script language="javascript">
function calAge(o){
     var tmp = o.value.split("-");
     var current = new Date();
     var current_year = current.getFullYear();
     document.getElementById("AGE").value = current_year - tmp[0];
}
</script>