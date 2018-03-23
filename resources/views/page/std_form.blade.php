@extends('layouts.main')

@section('content')
<div class="container-fluid" style="background:linear-gradient(white,#e6e6e6);">
    <h3><img src="/icon/notes.png"> ข้อมูลนักศึกษา</h3>
</div>
<br>
<form action="/save_std" medthod="get">
    <!-- รหัสนักศึกษา -->
    <div class="form-group form-inline">
        <label class="col-sm-3">รหัสนักศึกษา</label>
        <input type="text" class="form-control" style="width:70%" placeholder="รหัสนักศึกษา" name="StdID" >
    </div>
    <!--ชื่อ-->
    <div class="form-group form-inline">
        <label class="col-sm-3">ชื่อ-สกุล</label>        
        <select class="form-control" name="TitleName">
            <option value="นาย">นาย</option>
            <option value="นาง">นาง</option>
            <option value="นางสาว">นางสาว</option>
        </select>&nbsp;
        <input type="text" class="form-control" style="width:60%" placeholder="่ชื่อ-สกุล" name="FullName" >
    </div>
    <!-- เพศ -->
    <div class="form-group form-inline">
        <label class="col-sm-3">เพศ</label>        
        <input type="radio" name="Gender" value="1" > ชาย &emsp;&emsp;
        <input type="radio" name="Gender" value="2" > หญิง &emsp;&emsp;
        <input type="radio" name="Gender" value="3" > เพศทางเลือก &emsp;&emsp;
    </div>
    <!-- วัน เดือน ปีเกิด -->
    <div class="form-group form-inline">
        <label class="col-sm-3">วัน เดือน ปีเกิด</label>
        <input class="form-control form-control-sm" type="Date" name="Birthday" id="date" onchange="calAge(this)">        
        &emsp;&emsp;&emsp;&emsp;
        <label>อายุ(ปี)</label>&emsp;
        <input type="text" class="form-control" style="width:10%" placeholder="อายุ(ปี)" readonly id="age">
    </div>
    <!-- คณะ -->
    <div class="form-group form-inline">
        <label class="col-sm-3">สังกัดคณะ</label>
        <select class="form-control" style="width:70%" name="FacultyID">
            <option value="1">วิทยาการคอมพิวเตอร์</option>
            <option value="2">ครุศาสตร์</option>
            <option value="3">เกษตรศาสตร์</option>
            <option value="4">มนุษยศาสตร์และสังคมศาสตร์</option>
            <option value="5">พยาบาลศาสตร์</option>
            <option value="6">แพทย์แผนไทยและแพทย์ทางเลือก</option>
            <option value="7">สาธารณสุขศาสตร์</option>
            <option value="8">นิติศาสตร์</option>
            <option value="9">วิทยาศาสตร์</option>
            <option value="10">บริหารธุรกิจและการจัดการ</option>
            <option value="11">เทคโนโลยีอุตสาหกรรม</option>
        </select>
    </div>
    <!-- สาขา -->
    <div class="form-group form-inline">
        <label class="col-sm-3">สาขาวิชา</label>
        <input type="radio" name="MajorID" value="1" > CS &emsp;&emsp;
        <input type="radio" name="MajorID" value="2" > SE &emsp;&emsp;
        <input type="radio" name="MajorID" value="3" > IMA &emsp;&emsp;
        <input type="radio" name="MajorID" value="4" > ITM &emsp;&emsp;
    </div>
    <!-- ที่อยู่ -->
    <div class="form-group form-inline">
        <label class="col-sm-3">ที่อยู่ปัจจุบัน</label>
        <textarea class="form-control" style="width:70%" rows="5" placeholder="ที่อยู่" name="Address"></textarea>
    </div>
    <!-- เบอร์โทรศัพท์ -->
    <div class="form-group form-inline">
        <label class="col-sm-3">เบอร์โทรศัพท์</label>
        <input type="text" class="form-control" style="width:70%" placeholder="เบอร์โทรศัพท์" name="Mobile" >
    </div>
    <!-- อาหาร -->
    <div class="form-group form-inline">
        <label class="col-sm-3">รายการอาหารที่ชอบ</label>
        <input class="form-check-input" type="checkbox" name="Food1" value="1"> ส้มตำ &emsp;&emsp;
        <input class="form-check-input" type="checkbox" name="Food2" value="2"> ลาบ &emsp;&emsp;
        <input class="form-check-input" type="checkbox" name="Food3" value="3"> ก้อย &emsp;&emsp;
        <input class="form-check-input" type="checkbox" name="Food4" value="4"> พิซซา &emsp;&emsp;
    </div>    
    <hr>
    <!-- User -->
    <div class="form-group form-inline">
        <label class="col-sm-3">User name</label>
        <input type="text" class="form-control" style="width:70%" placeholder="User name" name="Username" > 
    </div>
    <!-- Password -->
    <div class="form-group form-inline">
        <label class="col-sm-3">Password</label>
        <input type="password" class="form-control" style="width:70%" placeholder="Password" name="Password" >
    </div>
    <div class="col-sm-3"></div>
    <button type="submit" class="btn btn-success">บันทึก</button>
    <button type="button" class="btn btn-danger">ยกเลิก</button>
    <br><br>
</form>

@endsection
<script language="javascript">
function calAge(o){
     var tmp = o.value.split("-");
     var current = new Date();
     var current_year = current.getFullYear();
     document.getElementById("age").value = current_year - tmp[0];
}
</script>