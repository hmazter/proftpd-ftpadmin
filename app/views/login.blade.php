@extends('bare')

@section('title')
    Login
@stop

@section('content')

    <form action="{{ action('WebUserController@postLogin') }}" method="post" class="form-signin" role="form">
        <h2 class="form-signin-heading">FTP Admin</h2>

        @if (isset($message))
            <div class="alert {{$message['type']}}" role="alert">{{$message['text']}}</div>
        @endif

        <input type="text" name="username" class="form-control" placeholder="username" required autofocus>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <div class="checkbox">
            <label>
                <input type="checkbox" name="remember" value="remember-me"> Remember me
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>

@stop