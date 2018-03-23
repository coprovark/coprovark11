<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>webapp</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap/css/bootstrap.min.css') }}">

    <!-- MetisMenu CSS -->
    <link rel="stylesheet" href="{{ URL::asset('css/metisMenu/metisMenu.min.css') }}">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ URL::asset('css/sb-admin-2.css') }}">

    <!-- Custom Fonts -->
    <link rel="stylesheet" href="{{ URL::asset('css/font-awesome/css/font-awesome.min.css') }}">


</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">SB Admin v2.0</a>
            </div>
            <!-- /.navbar-header -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="index.html"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> CO-PROVARK<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="/co_register"> สมัครสมาชิก</a>
                                </li>
                                <li>
                                    <a href="/co_member">สมาชิก</a>
                                </li>
                                <!-- <li>
                                    <a href="/co_main_show">co_main</a>
                                </li>
                                <li>
                                    <a href="/co_blood_show">co_blood</a>
                                </li>  
                                <li>
                                    <a href="/co_branch_show">co_branch</a>
                                </li>
                                <li>
                                    <a href="/co_citizenship_show">co_citizenship</a>
                                </li>  
                                <li>
                                    <a href="/co_faculty_show">co_faculty</a>
                                </li>
                                <li>
                                    <a href="/co_gender_show">co_gender</a>
                                </li>  
                                <li>
                                    <a href="/co_institution_show">co_institution</a>
                                </li>
                                <li>
                                    <a href="/co_level_show">co_level</a>
                                </li>  
                                <li>
                                    <a href="/co_nationality_show">co_nationality</a>
                                </li>
                                <li>
                                    <a href="/co_religion_show">co_religion</a>
                                </li>                              
                                <li>
                                    <a href="/co_status_show">co_status</a>
                                </li>
                                <li>
                                    <a href="/co_style_show">co_style</a>
                                </li>  
                                <li>
                                    <a href="/co_titlename_show">co_titlename</a>
                                </li>
                                <li>
                                    <a href="/co_tpyestudent_show">co_tpyestudent</a>
                                </li>  
                                <li>
                                    <a href="/co_typeuser_show">co_typeuser</a>
                                </li>
                                <li>
                                    <a href="/co_user_show">co_user</a>
                                </li>   -->
                            </ul>
                            
                        </li>
                        <li>
                            <a href="/form_login2"><i class="fa fa-table fa-fw"></i> เข้าสู่ระบบ</a>
                        </li>
                        <li>
                            <a href="/form_register"><i class="fa fa-table fa-fw"></i> สมัครสมาชิก</a>
                        </li>
                        <li>
                            <a href="/list_users"><i class="fa fa-table fa-fw"></i> สมาชิก</a>
                        </li>
                        <li>
                            <a href="/std_form"><img src="icon/check-form.png"> บันทึกข้อมูลนักศึกษา</a>
                        </li>
                        <li>
                            <a href="/std_show"><img src="icon/check-form.png"> แสดงข้อมูลนักศึกษา</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        
                        
                        @yield('content')

                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="css/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="css/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>

</body>

</html>
