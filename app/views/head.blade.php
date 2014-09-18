@section('head')
	<meta charset="UTF-8">
    <title>{{$title}}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- bootstrap 3.0.2 -->
    <link href="{{Request::root()}}/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="{{Request::root()}}/assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="{{Request::root()}}/assets/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Ion Slider -->
    <link href="{{Request::root()}}/assets/css/ionslider/ion.rangeSlider.css" rel="stylesheet" type="text/css" />
    <!-- ion slider Nice -->
    <link href="{{Request::root()}}/assets/css/ionslider/ion.rangeSlider.skinNice.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap slider -->
    <link href="{{Request::root()}}/assets/css/bootstrap-slider/slider.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{Request::root()}}/assets/css/AdminLTE.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-1599707-6', 'auto');
      ga('send', 'pageview');

    </script>
    <meta property="og:title" content="Softver za profesionalnu orijentaciju"/>
    <meta property="og:description" content="Softver za profesionalnu orijentaciju prvenstveno je namenjen učenicima srednjih škola, ali i svima onima koji su radoznali i žele da saznaju 'da li su dobro odabrali'." />
    <meta property="og:image" content="http://vukstankovic.com/wp-content/uploads/2014/09/proor-450x320.png"/>
@stop