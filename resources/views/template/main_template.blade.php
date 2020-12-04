<!DOCTYPE html>
<html>

<!-- Mirrored from coderthemes.com/uplon_1.1/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jul 2016 11:31:30 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/><!-- /Added by HTTrack -->
<head>
    <meta>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <!-- App Favicon -->
    <link rel="shortcut icon" href="{{'images/favicon.ico'}}">

    <!-- App title -->
    <title>Smart Support</title>

    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="{{'plugins/morris/morris.css'}}">

    <!--Chartist Chart CSS -->
    <link rel="stylesheet" href="{{'plugins/chartist/dist/chartist.min.css'}}">

    <!-- Switchery css -->
    <link href="{{'plugins/switchery/switchery.min.css'}}" rel="stylesheet"/>

    <!-- App CSS -->
    <link href="{{'css/style.css'}}" rel="stylesheet" type="text/css"/>

    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <script src="{{'js/jquery.min.js'}}"></script>
    <!-- Modernizr js -->
    <script src="{{'js/modernizr.min.js'}}"></script>

    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '../../www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-79190402-1', 'auto');
        ga('send', 'pageview');

    </script>

</head>


<body class="fixed-left">

<!-- Begin page -->
<div id="wrapper">

    <!-- Top Bar Start -->
    <div class="topbar">

        <!-- LOGO -->
        <div class="topbar-left">
            <a href="#" class="logo">
                <i class="zmdi zmdi-group-work icon-c-logo"></i>
                <span>Smart Support</span></a>
        </div>


        <nav class="navbar navbar-custom">
            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <button class="button-menu-mobile open-left waves-light waves-effect">
                        <i class="zmdi zmdi-menu"></i>
                    </button>
                </li>
            </ul>

            <ul class="nav navbar-nav pull-right" style="padding-top:20px">

                @if(!Auth::user())
                    <button class="btn btn-info btn-addonc padding-top-10" data-toggle="modal"
                            data-target="#login_modal">Login
                    </button>
                @else

                    <li class="nav-item dropdown notification-list">
                        <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light nav-user"
                           data-toggle="dropdown" href="#" role="button"
                           aria-haspopup="false" aria-expanded="false">
                            <img src="{{'images/users/avatar-1.jpg'}}" alt="user" class="img-circle">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-arrow profile-dropdown "
                             aria-labelledby="Preview">

                            <a href="{{ URL::Route('logout') }}" class="dropdown-item notify-item">
                                <i class="zmdi zmdi-power"></i> <span>Logout</span>
                            </a>

                        </div>
                    </li>
                @endif

            </ul>

        </nav>

    </div>

    <div class="modal fade" id="login_modal" tabindex="-1" role="dialog" aria-labelledby="login modal"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <form id="login_form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="modal-body">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group {{ ($errors->has('createddate')) ? ' has-error' : '' }}">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control datepicker" id="email" name="email" required>
                                </div>
                            </div>
                            <br>
                            <div class="col-md-12">
                                <div class="form-group {{ ($errors->has('createddate')) ? ' has-error' : '' }}">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Top Bar End -->


    <!-- ========== Left Sidebar Start ========== -->
    <div class="left side-menu">
        <div class="sidebar-inner slimscrollleft">

            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <ul>
                    <li class="text-muted menu-title">Navigation</li>

                    @if(!Auth::user())
                        <li class="has_sub">
                            <a href="{{ URL::route('dashboard') }}" class="waves-effect active"><i
                                    class="zmdi zmdi-view-dashboard"></i><span> Dashboard </span> </a>
                        </li>
                    @endif

                    @if(Auth::user())
                        <li class="has_sub">
                            <a href="{{ URL::route('ticket_list') }}" class="waves-effect"><i
                                    class="zmdi zmdi-view-web"></i><span> Ticket List </span> </a>
                        </li>
                        @if(Auth::user()->isAdmin())
                            <li class="has_sub">
                                <a href="{{ URL::route('user_list') }}" class="waves-effect"><i
                                        class="zmdi zmdi-view-web"></i><span> Manage Support Agents </span> </a>
                            </li>
                        @endif
                    @endif

                </ul>
                <div class="clearfix"></div>
            </div>
            <!-- Sidebar -->
            <div class="clearfix"></div>

        </div>

    </div>
    <!-- Left Sidebar End -->


    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">

                @yield('content')

            </div> <!-- container -->

        </div> <!-- content -->


    </div>
    <!-- End content-page -->


    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->


    <footer class="footer text-right">
        2020 © Smart Support - Heshani
    </footer>


</div>
<!-- END wrapper -->


<script>
    var resizefunc = [];
</script>

<!-- jQuery  -->
<script src="{{'js/tether.min.js'}}/"></script><!-- Tether for Bootstrap -->
<script src="{{'js/bootstrap.min.js'}}"></script>
<script src="{{'js/detect.js'}}"></script>
<script src="{{'js/fastclick.js'}}"></script>
<script src="{{'js/jquery.blockUI.js'}}"></script>
<script src="{{'js/waves.js'}}"></script>
<script src="{{'js/jquery.nicescroll.js'}}"></script>
<script src="{{'js/jquery.scrollTo.min.js'}}"></script>
<script src="{{'js/jquery.slimscroll.js'}}"></script>
<script src="{{'plugins/switchery/switchery.min.js'}}"></script>

<!--Morris Chart-->
<script src="{{'plugins/morris/morris.min.js'}}"></script>
<script src="{{'plugins/raphael/raphael-min.js'}}"></script>

<!-- Counter Up  -->
<script src="{{'plugins/waypoints/lib/jquery.waypoints.js'}}"></script>
<script src="{{'plugins/counterup/jquery.counterup.min.js'}}"></script>

<!--Chartist Chart-->
<script src="{{'plugins/chartist/dist/chartist.min.js'}}"></script>
<script src="{{'plugins/chartist/dist/chartist-plugin-tooltip.min.js'}}"></script>

<!-- Flot chart js -->
<script src="{{'plugins/flot-chart/jquery.flot.js'}}"></script>
<script src="{{'plugins/flot-chart/jquery.flot.time.js'}}"></script>
<script src="{{'plugins/flot-chart/jquery.flot.tooltip.min.js'}}"></script>
<script src="{{'plugins/flot-chart/jquery.flot.resize.js'}}"></script>
<script src="{{'plugins/flot-chart/jquery.flot.pie.js'}}"></script>
<script src="{{'plugins/flot-chart/jquery.flot.selection.js'}}"></script>
<script src="{{'plugins/flot-chart/jquery.flot.stack.js'}}"></script>
<script src="{{'plugins/flot-chart/jquery.flot.crosshair.js'}}"></script>
<script src="{{'plugins/flot-chart/jquery.flot.axislabels.js'}}"></script>

<!-- flot init -->
<script src="{{'pages/jquery.flot.init.js'}}"></script>

<script src="{{'plugins/chartist/dist/chartist.min.js'}}"></script>
<script src="{{'plugins/chartist/dist/chartist-plugin-tooltip.min.js'}}"></script>
<script src="{{'pages/jquery.chartist.init.js'}}"></script>

<!-- App js -->
<script src="{{'js/jquery.core.js'}}"></script>
<script src="{{'js/jquery.app.js'}}"></script>

<!-- Page specific js -->
{{--<script src="{{'pages/jquery.dashboard.js'}}"></script>--}}
<script src="{{'pages/jquery.chart-widgets.init.js'}}"></script>

<script type="text/javascript">


    $('#login_form').on('submit', function (event) {
        event.preventDefault();

        var loginform = new FormData(this);
        $('.form-group').removeClass('has-error');

        $.ajax({
            headers: {'X-CSRF-Token': $(this).find('input[name="_token"]').val()},
            url: '{{ route('login') }}',
            data: loginform,
            dataType: 'json',
            processData: false,
            contentType: false,
            type: 'POST',
            success: function (data) {

                if (data.code !== 200) {
                    alert('Please Try again');
                } else {
                    window.location.href = "{{ route('ticket_list')}}";
                }
            },
            error: function (error) {
                alert('error');
                {{--btn.button('reset');--}}
                {{--setNotify(2, "{{ Helpers::setGlobalVariable('sys_request_error_message')  }}");--}}
            }
        });

        return false;
    });


</script>

</body>

<!-- Mirrored from coderthemes.com/uplon_1.1/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jul 2016 11:32:43 GMT -->
</html>
