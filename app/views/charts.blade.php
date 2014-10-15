@extends('layout')


@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Charts
                </h1>
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
                            <h3 class="panel-title">
                                <a href="#loginsChart" data-toggle="collapse">
                                    <i class="fa fa-line-chart"></i> Number of logins
                                </a>
                            </h3>
                        </div>
                        <div id="loginsChart" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <div class="flot-chart">
                                    <div class="flot-chart-content" id="flot-logins-chart"></div>
                                </div>
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
    <script src="js/charts.js"></script>
    <script>
    var upload   = [],
        download = [];
        @foreach($transferData as $date => $types)
            upload.push([{{ strtotime($date)*1000 }}, {{ isset($types['STOR'])? number_format($types['STOR']/(1024*1024), 3, '.', ''): 0 }}]);
            download.push([{{ strtotime($date)*1000 }}, {{ isset($types['RETR'])? number_format($types['RETR']/(1024*1024), 3, '.', ''): 0 }}]);
        @endforeach

    var logins = [];
    @foreach($logins as $date => $logins)
        logins.push([{{ strtotime($date)*1000 }}, {{ $logins }}]);
    @endforeach

    </script>
@endsection