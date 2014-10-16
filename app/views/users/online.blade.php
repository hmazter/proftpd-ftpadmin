@extends('layout')


@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    <span id="online-count">{{ $online }}</span> Online Users
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-12">
                <div id="table-wrapper" class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Time online</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user['userid'] }}</td>
                                <td>{{ $user['time'] }}</td>
                                <td>{{ $user['status'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="pull-right">
                <label for="refresh-rate">Refresh rate</label>
                <select id="refresh-rate">
                    <option value="1000">1 second</option>
                    <option value="5000" selected="selected">5 seconds</option>
                    <option value="10000">10 seconds</option>
                    <option value="30000">30 seconds</option>
                    <option value="60000">1 minute</option>
                </select>
                </div>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->
@endsection

@section('javascript')
<script>
function getUserCount(){
    $.getJSON('/api/online-count', function(response) {
        var refreshRate = $('#refresh-rate').val();
        $('#online-count').text(response.count);
        setTimeout(getUserCount, refreshRate);
        if(response.count > 0){
            updateTable();
        }
    });
}

function updateTable() {
    $.getJSON('/api/online-list', function(response) {
        $('#table-wrapper tbody').empty();
        for(var i in response.online) {
            var user = response.online[i];
            var html = '<tr>';
            html += '   <td>' + user.userid + '</td>';
            html += '   <td>' + user.time + '</td>';
            html += '   <td>' + user.status + '</td>';
            html += '</tr>';
            $('#table-wrapper tbody').append(html);
        }
    });
}

$(document).ready(function() {
    getUserCount();
});
</script>
@endsection