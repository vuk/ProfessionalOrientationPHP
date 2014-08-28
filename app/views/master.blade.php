<!DOCTYPE html>
<html>
    <head>
        @yield('head')
    </head>
    <body class="skin-blue">
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=355697367892039&version=v2.0";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="{{Request::root()}}" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                Puskice.org
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
                        {{$heading}}
                    </h1>
                </section>

                @yield('main')
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
