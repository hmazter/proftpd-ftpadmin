@extends('layout')


@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Groups
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
                                <th>Groupname</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($groups as $group)
                            <tr>
                                <td>{{ $group->groupname }}</td>
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