<!DOCTYPE html>
<html>
    <head>
        @yield('head')
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="../../index.html" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                {{$title}}
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <!-- <img src="../../img/avatar3.png" class="img-circle" alt="User Image" /> -->
                        </div>
                        <div class="pull-left info">
                           <!--  <p>Hello, Jane</p> -->

                            <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
                        </div>
                    </div>
                    <!-- search form -->
                    <!-- <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form> -->
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <!-- <li>
                            <a href="../../index.html">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="../widgets.html">
                                <i class="fa fa-th"></i> <span>Widgets</span> <small class="badge pull-right bg-green">new</small>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-bar-chart-o"></i>
                                <span>Charts</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="../charts/morris.html"><i class="fa fa-angle-double-right"></i> Morris</a></li>
                                <li><a href="../charts/flot.html"><i class="fa fa-angle-double-right"></i> Flot</a></li>
                                <li><a href="../charts/inline.html"><i class="fa fa-angle-double-right"></i> Inline charts</a></li>
                            </ul>
                        </li> -->
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Osnovni podaci
                        <small></small>
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Osnovni podaci</h3>
                                </div><!-- /.box-header -->
                                <form action="http://localhost:8080/Professional_Orientation/api/request/post" method="post">
                                    <div class="box-body">
                                        <div class="row margin">
                                            <div class="col-sm-10">
                                                <div class="form-group">
                                                    <label>Ime</label>
                                                    <input type="text" name="first_name" class="form-control" placeholder="Ime">
                                                </div>
                                                <div class="form-group">
                                                    <label>Prezime</label>
                                                    <input type="text" name="last_name" class="form-control" placeholder="Prezime">
                                                </div>
                                                <div class="form-group">
                                                    <label>E mail</label>
                                                    <input type="email" name="email" class="form-control" placeholder="E mail">
                                                </div>
                                                <div class="form-group">
                                                    <label>Godina rođenja</label>
                                                    <input type="text" name="year_of_birth" class="form-control" placeholder="Godina rođenja">
                                                </div>
                                                <div class="form-group">
                                                    <label>Opština stanovanja</label>
                                                    <select name="current_town" class="form-control">
                                                        @foreach($municipalities as $municipality)
                                                            <option value="{{$municipality->id}}">{{$municipality->title}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Srednja škola</label>
                                                    <select name="school" class="form-control">
                                                        @foreach($schools as $school)
                                                            <option value="{{$school->id}}">{{$school->title}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Naziv srednje škole</label>
                                                    <input type="text" name="high_school" class="form-control" placeholder="Naziv srednje škole">
                                                </div>
                                                <div class="form-group">
                                                    <label>Gender</label>
                                                    <select name="gender" class="form-control">
                                                        <option value="1">M</option>
                                                        <option value="2">Z</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="submit" name="submit" value="Idi na pitanja" class="btn btn-primary">
                                    </div><!-- /.box-body -->
                                </form>
                            </div><!-- /.box -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="{{Request::root()}}/assets/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="{{Request::root()}}/assets/js/AdminLTE/app.js" type="text/javascript"></script>

        <!-- Bootstrap slider -->
        <script src="{{Request::root()}}/assets/js/plugins/bootstrap-slider/bootstrap-slider.js" type="text/javascript"></script>

        <script type="text/javascript">
            $(function() {
                /* BOOTSTRAP SLIDER */
                $('.slider').slider();
            });
        </script>

    </body>
</html>
