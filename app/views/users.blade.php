@extends('layout')


@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Users
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-12">

                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Group</th>
                                <th>Last access</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->userid }}</td>
                                <td>{{ $user->group->groupname }}</td>
                                <td>{{ $user->last_accessed }}</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-default">Edit</a>
                                    <a href="#" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->
@endsection