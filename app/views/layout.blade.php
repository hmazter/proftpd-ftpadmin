<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Hmazter FTP Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('css/sb-admin.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('font-awesome-4.1.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ action('HomeController@dashboard') }}">FTP Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{ Auth::user()->fullName(); }} <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{ action('WebUserController@logout') }}"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php
            $menu = array(
                array(
                    'title' => 'Dashboard',
                    'icon'  => 'fa-dashboard',
                    'url'   => action('HomeController@dashboard')
                ),
                array(
                    'title' => 'Users',
                    'icon'  => 'fa-user',
                    'url'   => action('UserController@getUsers')
                ),
                array(
                    'title' => 'Groups',
                    'icon'  => 'fa-users',
                    'url'   => action('GroupController@getGroups')
                ),
                array(
                    'title' => 'Logs',
                    'icon'  => 'fa-table',
                    'childs' => array(
                        array(
                            'title' => 'Transfers',
                            'url'   => action('LogController@getTransfers')
                        ),
                        array(
                            'title' => 'Logins',
                            'url'   => action('LogController@getLogins')
                        ),
                    )
                ),
            );
            ?>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    @foreach($menu as $item)
                        @if(isset($item['childs']))
                            <li>
                                <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw {{ $item['icon']; }}"></i> {{ $item['title']; }} <i class="fa fa-fw fa-caret-down"></i></a>
                                <ul id="demo" class="collapse">
                                    @foreach($item['childs'] as $child)
                                        <li>
                                            <a href="{{ $child['url']; }}">{{ $child['title']; }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @else
                            <li {{ Request::url() == $item['url'] ? 'class="active"' : '' }}>
                                <a href="{{ $item['url']; }}"><i class="fa fa-fw {{ $item['icon']; }}"></i> {{ $item['title']; }}</a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            @yield('content')

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery Version 1.11.0 -->
    <script src="{{ asset('js/jquery-1.11.0.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    @yield('javascript')

</body>
</html>
