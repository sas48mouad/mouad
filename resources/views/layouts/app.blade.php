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
        <link href="{{ URL::asset('css/main.css') }}" rel="stylesheet" type="text/css"/>


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


    <body class="nav-md">

        <div class="container body">


            <div class="main_container">



                <!-- front navigation -->
                @yield('frontnav')
                
                <!-- /front navigation -->


                <!-- top navigation -->
                @yield('toptnav')
                
                <!-- /top navigation -->

                <!-- page content -->
                <div class="right_col" role="main">
                    <div class="">
                        <div class="page-title">
                            <div class="title_left">
                                <h3>@yield('pagetitle')</h3>
                            </div>


                            <!--                            <div class="title_right">
                                                            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" placeholder="Search for...">
                                                                    <span class="input-group-btn">
                                                                        <button class="btn btn-default" type="button">Go!</button>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>-->
                        </div>
                        <div class="clearfix"></div>

                        <div class="main-page-container">
                            @yield('content')

                        </div>

                    </div>



                </div>
                <!-- /page content -->
            </div>

        </div>

        <div id="custom_notifications" class="custom-notifications dsp_none">
            <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
            </ul>
            <div class="clearfix"></div>
            <div id="notif-group" class="tabbed_notifications"></div>
        </div>


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