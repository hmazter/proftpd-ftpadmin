<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>
        @yield('title')
        Hillsong Kids Checkin
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #222;
        }

        .form-signin {
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
            background-color: #FFFFFF;
            border-radius: 5px;
            border: 1px solid #CCC;
        }

        .form-signin .form-signin-heading,
        .form-signin .checkbox {
            margin-bottom: 10px;
            text-align: center;
        }
        .form-signin .checkbox {
            font-weight: normal;
        }
        .form-signin .form-control {
            position: relative;
            height: auto;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding: 10px;
            font-size: 16px;
        }
        .form-signin .form-control:focus {
            z-index: 2;
        }
        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }
        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>

</head>

<body>


    <div class="container">

        @yield('content')

    </div> <!-- /container -->

    <script src="{{ asset('js/jquery-1.11.0.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

</body>
</html>