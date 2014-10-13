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
            <div class="col-lg-12 action-row">
                <button class="btn btn-default btn-edit"><i class="fa fa-plus-square-o fa-lg"></i> Add new User</button>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div id="table-wrapper" class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Group</th>
                                <th>Total transfer</th>
                                <th>Last access</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr id="row-{{ $user->id }}">
                                <td>{{ $user->userid }}</td>
                                <td>{{ $user->group->groupname }}</td>
                                <td>{{ $user->totalTransferFormated() }}</td>
                                <td>{{ $user->last_accessed }}</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-default btn-edit" data-id="{{ $user->id }}"><i class="fa fa-pencil-square-o fa-lg"></i> Edit</a>
                                    <a href="#" class="btn btn-sm btn-danger btn-delete" data-id="{{ $user->id }}"><i class="fa fa-trash-o fa-lg"></i> Delete</a>
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

    @include('users.dialog')
@endsection

@section('javascript')
<script>
    function clear_dialog() {
        $('.modal form input').val(null);
    }

    function show_dialog(id) {
        clear_dialog();
        console.log('show dialog '+ id);
        $('#user-modal').modal('show');

        if(id > 0) {
            $('#user-modal .loading').show();
            $.getJSON(
                '/user/'+id,
                function(response){
                    console.log(response);
                    for(var key in response){
                        var value = response[key];
                        console.log('.model form input[name="'+key+'"]'+' = '+value);
                        //$('.modal form input[name="'+key+'"]').val(value);
                        $('.modal form #'+key).val(value);
                    }
                    $('#user-modal .loading').hide();
                }
            );
        }
    }

    function reload_page() {
        console.log('reload');
        $('#table-wrapper').load('/users #table-wrapper table');
    }

    $(document).ready(function(){
        $(document).on('click', '.btn-delete', function(e){
            e.preventDefault();
            console.log('onClick delete');
            var id = $(this).data('id');
            $.ajax({
                type: "POST",
                url: '/user/delete/'+id,
                dataType: 'json',
                success: function(response){
                    console.log(response);
                    console.log('callback');
                    $('#row-'+id).remove();
                }
            });
        });

        $(document).on('click', '.btn-edit', function(e){
            e.preventDefault();
            console.log('onClick edit');
            show_dialog($(this).data('id'));
        });

        $('#user-form').submit(function(e) {
            e.preventDefault();
            $('.modal .saving').show();
            var data = $('.modal form').serialize();
            console.log(data);

            // save data
            $.ajax({
                type: "POST",
                url: '/user/save',
                data: data,
                dataType: 'json',
                success: function(response){
                    console.log(response);
                    console.log('callback');
                    reload_page();
                    $('.modal .saving').hide();
                    $('#user-modal').modal('hide');
                }
            });
        });
    });
</script>
@endsection