@extends('layout')


@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Transfers
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-12">
                <table class="table table-bordered table-condensed">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Client IP</th>
                            <th>Server IP</th>
                            <th>When</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($logins as $login)
                        <tr>
                            <td>{{ $login->userid }}</td>
                            <td>{{ $login->client_ip }}</td>
                            <td>{{ $login->server_ip }}</td>
                            <td>{{ $login->when }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $logins->links(); }}
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->
@endsection