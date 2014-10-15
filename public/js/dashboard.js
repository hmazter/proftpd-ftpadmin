function getUserCount(){
    $.getJSON('/api/online-count', function(response) {
        $('#online-count').text(response.count);
        setTimeout(getUserCount, 30000);    // update again in 30 seconds
    });
}

function plotTransferDataChart() {
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
            min: 0,
            tickFormatter: function (val, axis) {
                return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            }
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
        },
        legend: {
            position: "nw"
        }
    };

    $.plot(
        $("#flot-transfer-chart"),
        [{
            data: upload,
            label: "Upload (MiB)"
        }, {
            data: download,
            label: "Download (MiB)"
        }],
        options
    );
}

$(document).ready(function() {
    getUserCount();
    plotTransferDataChart();
});