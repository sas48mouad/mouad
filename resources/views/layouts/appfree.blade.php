<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('taptitle')</title>

        <!-- Bootstrap core CSS -->
        <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ URL::asset('fonts/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ URL::asset('css/animate.min.css') }}" rel="stylesheet" type="text/css"/>


        <!-- Custom styling plus plugins -->
        <link href="{{ URL::asset('css/custom.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ URL::asset('css/icheck/flat/green.css') }}" rel="stylesheet" type="text/css"/>


        @yield('style')



        <!--[if lt IE 9]>
            <script src="../assets/js/ie8-responsive-file-warning.js"></script>
            <![endif]-->

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
              <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->

    </head>
   <body style="background:#F7F7F7;">

    @yield('content')


        @yield('modal')


        <script src="{{ URL::asset('js/jquery.min.js') }}" type="text/javascript"></script>

        <script src="{{ URL::asset('js/bootstrap.min.js') }}" type="text/javascript"></script>

        <!--chart js--> 
        <script src="{{ URL::asset('js/chartjs/chart.min.js') }}" type="text/javascript"></script>

        <!--bootstrap progress js--> 
        <script src="{{ URL::asset('js/progressbar/bootstrap-progressbar.min.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('js/nicescroll/jquery.nicescroll.min.js') }}" type="text/javascript"></script>


        <!--icheck--> 
        <script src="{{ URL::asset('js/icheck/icheck.min.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('js/custom.js') }}" type="text/javascript"></script>


        <!--moris js--> 
        <script src="{{ URL::asset('js/moris/raphael-min.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('js/moris/morris.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('js/moris/example.js') }}" type="text/javascript"></script>


        @yield('script')

    </body>

</html>