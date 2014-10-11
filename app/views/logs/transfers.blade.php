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
                            <th>File</th>
                            <th>Size</th>
                            <th>Type</th>
                            <th>When</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transfers as $transfer)
                        <tr>
                            <td>{{ $transfer->userid }}</td>
                            <td>{{ $transfer->file }}</td>
                            <td>{{ $transfer->size }}</td>
                            <td>{{ $transfer->type }}</td>
                            <td>{{ $transfer->when }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $transfers->links(); }}
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->
@endsection