<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <title>{{ config('app.name', 'Laravel') }} | Admin</title>

    <link href="{{ asset('admin/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <link href="{{ asset('admin/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">

    <link href="{{ asset('admin/css/plugins/iCheck/custom.css') }}" rel="stylesheet"/>
    <link href="{{ asset('admin/css/plugins/steps/jquery.steps.css')}}" rel="stylesheet"/>

    {{--Toatsr--}}
    <link href="{{ asset('bower_resources/toastr/toastr.css') }}" rel="stylesheet"/>

    <link rel="stylesheet" href="{{ asset('bower_resources/jquery-confirm-master/dist/jquery-confirm.min.css') }}">

    <link href="{{ asset('admin/css/plugins/datapicker/datepicker3.css') }}" rel="stylesheet"/>

    <!-- Data Tables -->

    <link href="{{ asset('admin/css/plugins/dataTables/dataTables.bootstrap.css')}}" rel="stylesheet">
    <link href="{{ asset('admin/css/plugins/dataTables/dataTables.tableTools.min.css')}}" rel="stylesheet">
    <link href="{{ asset('admin/css/plugins/dataTables/dataTables.responsive.css')}}" rel="stylesheet">

    <!-- Easy Ui-->
    <link href="{{ asset('easyui/themes/default/easyui.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('easyui/themes/icon.css') }}" type="text/css" rel="stylesheet">

    <link href="{{ asset('admin/css/jquery.dataTables.min.css') }}" rel="stylesheet">

    <link href="{{ asset('admin/css/plugins/chosen/bootstrap-chosen.css') }}" rel="stylesheet">

    {{--lading--}}
    <link href="{{ asset('bower_resources/jquery-loading-master/dist/jquery.loading.css') }}" rel="stylesheet"/>

    @yield("css")
</head>

<body class="pace-done skin-1">

<div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="side-menu">
                {{-- avatar user --}}
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <span>
                            <img alt="image" class="img-circle" src="{{asset('admin/img/48x48.png')}}"/>
                        </span>


                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear">
                                <span class="block m-t-xs">
                                    <strong class="font-bold">{{Auth::check() ? Auth::user()->nom : ''}}</strong>
                                </span>
                                <span class="text-muted text-xs block">
                                    Administrateur
                                    <b class="caret"></b>
                                </span>
                            </span>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="#">Profile</a></li>
                            <li class="divider"></li>
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out"></i> {{ __('Déconexion') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        DS
                    </div>
                </li>
                {{-- menu list --}}
                @include('admin.layouts.menu')
            </ul>
        </div>
    </nav>

    {{-- TOP --}}
    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                    <form role="search" class="navbar-form-custom" method="GET" action="{{route('admin.fichier.index')}}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <input type="text" placeholder="Rechercher un fichier ..." class="form-control" name="titre" id="top-search" value="{{Request::input("titre")}}">
                        </div>
                    </form>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <span class="m-r-sm text-muted welcome-message">Bienvenue dans le centre de partage <i>Dago-Share</i>.</span>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                            <i class="fa fa-envelope"></i>  <span class="label label-warning">16</span>
                        </a>
                        <ul class="dropdown-menu dropdown-messages">
                            <li>
                                <div class="dropdown-messages-box">
                                    <a href="profile.html" class="pull-left">
                                        <img alt="image" class="img-circle" src="{{asset('admin/img/a7.jpg')}}">
                                    </a>
                                    <div class="media-body">
                                        <small class="pull-right">46h ago</small>
                                        <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
                                        <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                    </div>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="dropdown-messages-box">
                                    <a href="profile.html" class="pull-left">
                                        <img alt="image" class="img-circle" src="{{asset('admin/img/a4.jpg')}}">
                                    </a>
                                    <div class="media-body ">
                                        <small class="pull-right text-navy">5h ago</small>
                                        <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
                                        <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                    </div>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="dropdown-messages-box">
                                    <a href="profile.html" class="pull-left">
                                        <img alt="image" class="img-circle" src="{{asset('admin/img/profile.jpg')}}">
                                    </a>
                                    <div class="media-body ">
                                        <small class="pull-right">23h ago</small>
                                        <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                        <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                    </div>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="text-center link-block">
                                    <a href="mailbox.html">
                                        <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                            <i class="fa fa-bell"></i>  <span class="label label-primary">8</span>
                        </a>
                        <ul class="dropdown-menu dropdown-alerts">
                            <li>
                                <a href="mailbox.html">
                                    <div>
                                        <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="profile.html">
                                    <div>
                                        <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                        <span class="pull-right text-muted small">12 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="grid_options.html">
                                    <div>
                                        <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="text-center link-block">
                                    <a href="notifications.html">
                                        <strong>Voire toutes les notifications</strong>
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out"></i> Déconnexion
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </nav>
        </div>

        {{-- CONTENT --}}
        <div class="row wrapper border-bottom white-bg page-heading filigrane">
            @yield("page-heading")
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="wrapper wrapper-content">
                    @yield("content")
                    <div class="row back-top">
                        <a href="#" id="back-to-top" title="Retour en haut" class="pull-right btn btn-primary btn-circle" style="display: none">
                            <i class="fa fa-chevron-up fa-w-14 fa-2x" id="icone-back-to-top"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- FOOTER --}}
        <div class="footer">
            <div class="row">
                <div class="col-lg-5">
                    <strong>Copyright</strong> Agnaro Webcompany &copy; 2019
                </div>

                <div class="pull-right">
                    10GB libre sur <strong>250GB</strong>
                </div>
            </div>

        </div>
    </div>
</div>

{{-- Mini Tchat --}}
@include('admin.layouts.tchat')

<!-- Mainly scripts -->
<script type="text/javascript">
    var site_url = "{{url('/')}}";
    var _token = "{{csrf_token()}}";
</script>
<script src="{{ asset('admin/js/jquery-2.1.1.js') }}"></script>
<script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
<script src="{{ asset('admin/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('bower_resources/jquery-validation/dist/jquery.validate.js') }}"></script>
<script src="{{ asset('admin/js/plugins/iCheck/icheck.min.js')}}"></script>
<script src="{{ asset('admin/js/plugins/jasny/jasny-bootstrap.min.js')}}"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

<!-- Custom and plugin javascript -->
<script src="{{ asset('admin/js/script.js') }}"></script>
<script src="{{ asset('admin/js/inspinia.js') }}"></script>
<script src="{{ asset('admin/js/plugins/pace/pace.min.js') }}"></script>

{{-- Toastr --}}
<script src="{{ asset('bower_resources/toastr/toastr.js') }}"></script>
<script src="{{ asset('bower_resources/jquery-confirm-master/dist/jquery-confirm.min.js') }}"></script>
<script src="{{ asset('bower_resources/chosen/chosen.jquery.js') }}"></script>
<script src="{{ asset('admin/js/plugins/validate/jquery.validate.min.js')}}"></script>
<script src="{{ asset('admin/js/plugins/staps/jquery.steps.min.js') }}"></script>
<script src="{{ asset('admin/js/plugins/datapicker/bootstrap-datepicker.js')}}"></script>


{{-- Easy Ui--}}
<script src="{{ asset('easyui/easyloader.js') }}"></script>
<script src="{{ asset('easyui/locale/easyui-lang-fr.js') }}"></script>
<script src="{{ asset('easyui/jquery.easyui.min.js') }}"></script>

<!-- Data Tables -->
<script src="{{ asset('admin/js/plugins/dataTables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('admin/js/plugins/dataTables/dataTables.bootstrap.js') }}"></script>
<script src="{{ asset('admin/js/plugins/dataTables/dataTables.responsive.js') }}"></script>
<script src="{{ asset('admin/js/plugins/dataTables/dataTables.tableTools.min.js') }}"></script>

<script src="{{ asset('admin/js/script.js') }}"></script>

<script src="{{ asset('admin/js/jquery.dataTables.min.js') }}"></script>

<script src="{{ asset('admin/js/plugins/chosen/chosen.jquery.js') }}"></script>

<script src="{{ asset('bower_resources/jquery-loading-master/dist/jquery.loading.js') }}"></script>

@if (Session::has('notifier.notice'))
    <?php
    $notif = json_decode(Session::get('notifier.notice'));

    $title = $notif->title;
    $text = isset($notif->text) && $notif->text != '' ? $notif->text : '';
    $type = $notif->type;
    ?>


    <script>
        toastr.options = {
            "icon" : false,
            "closeButton": true,
            "debug": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "onclick": null,
            "showDuration": "400",
            "hideDuration": "1000",
            "timeOut": "7000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        if("{{$type}}" == 'success'){
            toastr.success("{{$text}}" , "{{$title}}")
        }
        if("{{$type}}" == 'warning'){
            toastr.warning("{{$text}}" , "{{$title}}")
        }
        if("{{$type}}" == 'error'){
            toastr.error("{{$text}}" , "{{$title}}")
        }
    </script>
@endif

@yield("scripts")
</body>

</html>
