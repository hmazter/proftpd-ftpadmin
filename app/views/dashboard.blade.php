@extends('layout')


@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Dashboard
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-3 col-md-6">

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-users fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge" id="online-count">?</div>
                                <div>
                                    <a href="{{ action('UserController@online') }}" style="color: #fff;">
                                        Online users! <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
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
                        <h3 class="panel-title">
                            <a href="#transferChart" data-toggle="collapse">
                                <i class="fa fa-line-chart"></i> Transfer data amount
                            </a>
                        </h3>
                    </div>
                    <div id="transferChart" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <div class="flot-chart">
                                <div class="flot-chart-content" id="flot-transfer-chart"></div>
                            </div>
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
                        <h3 class="panel-title">
                            <a href="#lastTransfer" data-toggle="collapse">
                                <i class="fa fa-table"></i> Last Transfers
                            </a>
                        </h3>
                    </div>
                    <div id="lastTransfer" class="panel-collapse collapse in">
                        <div class="panel-body table-responsive">
                            <table class="table table-bordered table-condensed">
                                <thead>
                                    <tr>
                                        <th>User</th>
                                        <th>File</th>
                                        <th>Size</th>
                                        <th>Duration</th>
                                        <th>When</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($transfers as $transfer)
                                    <tr>
                                        <td>{{ $transfer->userid }}</td>
                                        <td>
                                            <i class="fa {{ $transfer->type == 'STOR' ? 'fa-upload color-upload' : 'fa-download color-download' }} fa-fw"></i>
                                            {{ $transfer->file }}
                                        </td>
                                        <td>{{ $transfer->sizeFormatted() }}</td>
                                        <td>{{ $transfer->duration }} sec</td>
                                        <td>{{ $transfer->when }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
                        <a href="{{ action('LogController@getLogins') }}" class="pull-right">View Details <i class="fa fa-arrow-circle-right"></i></a>
                        <h3 class="panel-title">
                            <a href="#lastLogins" data-toggle="collapse">
                                <i class="fa fa-table"></i> Last Logins
                            </a>
                        </h3>
                    </div>
                    <div id="lastLogins" class="panel-collapse collapse in">
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
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->
@endsection

@section('javascript')
    <script src="js/plugins/flot/jquery.flot.js"></script>
    <script src="js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="js/dashboard.js"></script>
    <script src="js/charts.js"></script>
    <script>
    var upload   = [],
        download = [];
        @foreach($transferData as $date => $types)
            upload.push([{{ strtotime($date)*1000 }}, {{ isset($types['STOR'])? number_format($types['STOR']/(1024*1024), 3, '.', ''): 0 }}]);
            download.push([{{ strtotime($date)*1000 }}, {{ isset($types['RETR'])? number_format($types['RETR']/(1024*1024), 3, '.', ''): 0 }}]);
        @endforeach
    </script>
@endsection