@extends('layouts.main')

@section('content')
<style>
    input{
        margin: 2px 0 5px 0;
    }
    select{
        margin: 2px 0 5px 0;
    }
    textarea{
        margin: 2px 0 5px 0;
    }
</style>
<div class="container-fluid" style="background:linear-gradient(white,#e6e6e6);">
    <h3><img src="/icon/notes.png"> สมัครสมาชิก</h3>
</div>
<br>
<form class="form-group form-inline" action="/" medthod="get">
    <div >
        <label>วันที่กรอกข้อมูล</label>
        <input class="form-control form-control-sm" type="Date" name="DAY">
    </div>
    <hr>
    <div class="container-fluid">
        <!-- ประเภทผู้ใช้งาน -->
        <div class="col-sm-12">
            <label>ประเภทผู้ใช้งาน</label>&emsp;&emsp;
            <input type="radio" name="TPYEUSER" value="1" > นักเรียน &emsp;
            <input type="radio" name="TPYEUSER" value="2" > นักศึกษา &emsp;
            <input type="radio" name="TPYEUSER" value="3" > ครู/อาจารย์ &emsp;
        </div>

        <!-- รหัสนักศึกษา -->
        <div class="col-sm-6">
            <label>รหัสนักศึกษา</label>
            <input type="text" class="form-control" style="width:80%;" placeholder="รหัสนักศึกษา" name="STUDENTCODE" >
        </div>
        <!-- เลขบัตร -->
        <div class="col-sm-6">
            <label>เลขบัตรประชาชน</label>
            <input type="text" class="form-control" style="width:70%;" placeholder="เลขบัตรประชาชน" name="IDCARD" >
        </div>

        <!-- ชื่อ-สกุล -->
        <div class="col-sm-6">
            <label>ชื่อ-สกุล</label>
            <input type="text" class="form-control" style="width:86.5%;" placeholder="่ชื่อ-สกุล" name="NAME" >
        </div>
        <!-- ชื่อเล่น -->
        <div class="col-sm-6">
            <label>ชื่อเล่น</label>
            <input type="text" class="form-control" style="width:85%;" placeholder="ชื่อเล่น" name="NICKNAME" >
        </div>

        <!-- สาขาวิชา -->
        <div class="col-sm-6">
            <label>สาขาวิชา</label>
            <select class="form-control" style="width:85%" name="BRANCH">
                <option value="01">สาขาวิทยาการคอมพิวเตอร์</option>
                <option value="02">สาขาวิศวกรรมซอร์ฟแวร์</option>
                <option value="03">สาขาเทคโนโลยีมัลติมีเดียและแอนิเมชัน</option>
                <option value="04">สาขาเทคโนโลยีสารสนเทศ</option>
            </select>            
        </div>
        <!-- คณะ -->
        <div class="col-sm-6">
            <label>คณะ</label>        
            <select class="form-control" style="width:87.5%" name="FACULTY">
                <option value="01">คณะเกษตรศาสตร์</option>
                <option value="02">คณะครุศาสตร์</option>
                <option value="03">คณะเทคโนโลยีอุตสาหกรรม</option>
                <option value="04">คณะวิทยาการคอมพิวเตอร์</option>
                <option value="05">คณะมนุษยศาสตร์และสังคมศาสตร์</option>
                <option value="06">คณะพยาบาลศาสตร์</option>
                <option value="07">คณะแพทย์แผนไทยและแพทย์ทางเลือก</option>
                <option value="08">คณะสาธารณสุขศาสตร์</option>
                <option value="09">คณะนิติศาสตร์</option>
                <option value="10">คณะวิทยาศาสตร์</option>
                <option value="11">คณะบริหารธุรกิจและการจัดการ</option>
            </select>
        </div>
        <!-- ชั้นปี -->
        <div class="col-sm-3">
            <label>ชั้นปี</label>
            <select class="form-control" style="width:80%" name="LEVEL">
                <option value="1">ปี 1</option>
                <option value="2">ปี 2</option>
                <option value="3">ปี 3</option>
                <option value="4">ปี 4</option>
                <option value="5">ปี 5</option>
                <option value="6">ปี 6</option>
            </select>            
        </div>
        <!-- เกรด -->
        <div class="col-sm-3">
            <label>เกรดเฉลี่ย</label>
            <input type="text" class="form-control" style="width:65%;" placeholder="เกรดเฉลี่ย" name="GRADE" >
        </div>
        <!-- สถาบัน -->
        <div class="col-sm-6">
            <label>สถาบันการศึกษา</label>
            <select class="form-control" style="width:71%" name="INSTITUTION">
                <option value="001">มหาวิทยาลัยราชภัฏอุบลราชธานี</option>
                <option value="002">มหาวิทยาลัยอุบลราชธานี</option>
            </select>            
        </div>

        <!-- ประเภทนักศึกษา -->
        <div class="col-sm-6">
            <label>ประเภทนักศึกษา</label>&emsp;&emsp;
            <input type="radio" name="TPYESTUDENT" value="1" > ปกติ &emsp;
            <input type="radio" name="TPYESTUDENT" value="2" > กศ.บป. &emsp;
            <input type="radio" name="TPYESTUDENT" value="3" > กศ.อศ. &emsp;
        </div>
        <!-- Learning Style -->
        <div class="col-sm-5" style="padding-top:2px;">
            <label>Learning Style</label>&emsp;
            <label class="checkbox-inline">
                <input type="checkbox" value="1"> V
            </label>
            <label class="checkbox-inline">
                <input type="checkbox" value="2"> A
            </label>
            <label class="checkbox-inline">
                <input type="checkbox" value="3"> R
            </label>
            <label class="checkbox-inline">
                <input type="checkbox" value="4"> K
            </label>
            <label class="checkbox-inline">
                <input type="checkbox" value="5"> Model
            </label>
        </div>
        
        <!-- วันเกิด -->
        <div class="col-sm-4">
            <label>วัน เดือน ปีเกิด</label>
            <input class="form-control form-control-sm" style="width:63%;" type="Date" name="ฺBRITHDAY">
        </div>
        <!-- อายุ -->
        <div class="col-sm-2">
            <label>อายุ</label>
            <input type="text" class="form-control" style="width:70%;" placeholder="" name="AGE" >
        </div>
        <!-- เพศ -->
        <div class="col-sm-6" style="padding-top:7px;padding-bottom:7px;">
            <label>เพศ</label>&emsp;&emsp;
            <input type="radio" name="GENDER" value="1" > ชาย &emsp;
            <input type="radio" name="GENDER" value="2" > หญิง &emsp;
        </div>
        
        <!-- น้ำหนัก -->
        <div class="col-sm-3">
            <label>น้ำหนัก</label>
            <input type="text" class="form-control" style="width:70%;" placeholder="น้ำหนัก" name="WEIGHT" >
        </div>
        <!-- ส่วนสูง -->
        <div class="col-sm-3">
            <label>ส่วนสูง</label>
            <input type="text" class="form-control" style="width:74%;" placeholder="ส่วนสูง" name="HEIGHT" >
        </div>
        <!-- เลือด -->
        <div class="col-sm-6" style="padding-top:7px;padding-bottom:7px;">
            <label>หมู่เลือด</label>&emsp;&emsp;
            <input type="radio" name="BLOOD" value="1" > A &emsp;
            <input type="radio" name="BLOOD" value="2" > B &emsp;
            <input type="radio" name="BLOOD" value="3" > O &emsp;
            <input type="radio" name="BLOOD" value="4" > AB &emsp;
        </div>

        <!-- สถานะ -->
        <div class="col-sm-6" style="padding-top:5px;">
            <label>สถานะภาพ</label>&emsp;&emsp;
            <input type="radio" name="STATUS" value="1" > โสด &emsp;
            <input type="radio" name="STATUS" value="2" > แต่งงาน &emsp;
            <input type="radio" name="STATUS" value="3" > หม้าย &emsp;
            <input type="radio" name="STATUS" value="4" > หย่าร้าง &emsp;
        </div>
        <!-- สัญชาติ -->
        <div class="col-sm-6">
            <label>สัญชาติ</label>
            <select class="form-control" style="width:84%" name="CITIZENSHIP">
                <option value="001">ไทย</option>
                <option value="002">ลาว</option>
                <option value="003">กัมพูชา</option>
                <option value="004">พม่า</option>
            </select>            
        </div>
        <!-- เชื้อชาติ -->
        <div class="col-sm-6">
            <label>เชื้อชาติ</label>
            <select class="form-control" style="width:85%" name="NATIOTALITY">
                <option value="001">ไทย</option>
                <option value="002">ลาว</option>
                <option value="003">กัมพูชา</option>
                <option value="004">พม่า</option>
            </select>            
        </div>
        <!-- ศาสนา -->
        <div class="col-sm-6">
            <label>ศาสนา</label>
            <select class="form-control" style="width:85.5%" name="NATIOTALITY">
                <option value="01">พุทธ</option>
                <option value="02">คริสต์</option>
                <option value="03">อิสลาม</option>
                <option value="04">ฮินดู</option>
            </select>            
        </div>
        <!-- ภูมิลำเนา -->
        <div class="col-sm-12">
            <label>ที่อยู่ตามภูมิลำเนา</label>
            <textarea class="form-control" style="width:85.5%" rows="5" placeholder="ที่อยู่ตามภูมิลำเนา" name="PERADDRESS"></textarea>
        </div>
        <!-- ปัจจุบัน -->
        <div class="col-sm-12">
            <label>ที่อยู่ตามปัจจุบัน</label>
            <textarea class="form-control" style="width:87%" rows="5" placeholder="ที่อยู่ตามปัจจุบัน" name="PREADDRESS"></textarea>
        </div>
        <!-- โทรศัพท์ -->
        <div class="col-sm-6">
            <label>โทรศัพท์</label>
            <input type="text" class="form-control" style="width:85%;" placeholder="โทรศัพท์" name="PHONE" >
        </div>
        <!-- มือถือ -->
        <div class="col-sm-6">
            <label>มือถือ</label>
            <input type="text" class="form-control" style="width:86.5%;" placeholder="มือถือ" name="MOBILE" >
        </div>
        <!-- e-mail -->
        <div class="col-sm-6">
            <label>E-mail</label>
            <input type="text" class="form-control" style="width:88%;" placeholder="E-mail" name="E_MAIL" >
        </div>
        <!-- Facebook -->
        <div class="col-sm-6">
            <label>Facebook</label>
            <input type="text" class="form-control" style="width:80%;" placeholder="Facebook" name="FACEBOOK" >
        </div>
        <!-- Web -->
        <div class="col-sm-12">
            <label>Web</label>
            <input type="text" class="form-control" style="width:94%;" placeholder="Web" name="WEB" >
        </div>
    </div>
    <br>
    <div class="container-fluid">
    <center>
        <button type="submit" class="btn btn-success">บันทึก</button>
        <button type="button" class="btn btn-danger">ยกเลิก</button>
        </center>
    </div>
    <br><br>
</form>


@endsection