@extends('layout')


@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Dashboard <small>Statistics Overview</small>
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Transfer data amount</h3>
                    </div>
                    <div class="panel-body">
                        <div class="flot-chart">
                            <div class="flot-chart-content" id="flot-transfer-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="{{ action('LogController@getTransfers') }}" class="pull-right">View Details <i class="fa fa-arrow-circle-right"></i></a>
                        <h3 class="panel-title">Last Transfers</h3>
                    </div>
                    <div class="panel-body table-responsive">
                        <table class="table table-bordered table-condensed">
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>File</th>
                                    <th>Size</th>
                                    <th>Duration</th>
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
                                    <td>{{ $transfer->duration }}</td>
                                    <td>{{ $transfer->type }}</td>
                                    <td>{{ $transfer->when }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="{{ action('LogController@getLogins') }}" class="pull-right">View Details <i class="fa fa-arrow-circle-right"></i></a>
                        <h3 class="panel-title">Last Logins</h3>
                    </div>
                    <div class="panel-body table-responsive">
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
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->
@endsection


@section('javascript')

<script src="js/plugins/flot/jquery.flot.js"></script>
<script src="js/plugins/flot/jquery.flot.tooltip.min.js"></script>
<script>
var upload   = [],
    download = [];

    @foreach($transferData as $date => $types)
        upload.push([{{ strtotime($date)*1000 }}, {{ isset($types['STOR'])? $types['STOR']: 0 }}]);
        download.push([{{ strtotime($date)*1000 }}, {{ isset($types['RETR'])? $types['RETR']: 0 }}]);
    @endforeach

// Flot Line Chart with Tooltips
$(document).ready(function() {
    plot();

    function plot() {
        var options = {
            series: {
                lines: {
                    show: true
                },
                points: {
                    show: true
                }
            },
            grid: {
                hoverable: true //IMPORTANT! this is needed for tooltip to work
            },
            yaxis: {
                min: 0
            },
            xaxis: {
                mode: "time",
                timeformat: "%y-%m-%d"
            },
             tooltip: true,
             tooltipOpts: {
                 content: "%s %x was %y",
                 shifts: {
                     x: -60,
                     y: 25
                 }
             }
        };

        var plotObj = $.plot(
            $("#flot-transfer-chart"),
            [{
                data: upload,
                label: "Upload (byte)"
            }, {
                data: download,
                label: "Download (byte)"
            }],
            options
        );
    }
});
</script>

@endsection