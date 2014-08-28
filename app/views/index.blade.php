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
            @yield('left') 

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Pitanja
                        <small>{{$question_type}}</small>
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Pitanja {{$question_type}}</h3>
                                </div><!-- /.box-header -->
                                <form action="{{URL::action($action)}}" method="post">
                                    <div class="box-body">
                                        <p>Na pitanja se odgovara na skali od 1 do 10. Ocena 1 (skroz levo) znači da se najmanje slažete sa postavljenom tvrdnjom, a 10 (skroz desno) da se najviše slažete sa njom.</p>
                                        <div class="row margin">
                                            <div class="col-sm-6">
                                                @foreach($json as $key => $q)
                                                    <p><strong>{{$key+1}}.</strong> {{$q->question}}</p>
                                                    <input type="text" value="5" name="{{$q->id}}" class="slider form-control" data-slider-min="0" data-slider-max="10" data-slider-step="1" data-slider-value="5" data-slider-orientation="horizontal" data-slider-selection="before" data-slider-tooltip="show" data-slider-id="red">
                                                    <span style="float:left"><strong>0</strong> <small>(ne slažem se)</small></span><span style="float:right"><strong>10</strong> <small>(slažem se)</small></span>
                                                    <hr/>
                                                @endforeach
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="submit" name="submit" value="Pošalji" class="btn btn-primary pull-right">
                                            </div> 
                                        </div>
                                        <input type="submit" name="submit" value="Pošalji" class="btn btn-primary">
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
