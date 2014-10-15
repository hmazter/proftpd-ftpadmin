var chartOptions = {
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

function plotTransferDataChart() {
    var element = $("#flot-transfer-chart");
    if(element.length > 0) {
        $.plot(
            element,
            [{
                data: upload,
                label: "Upload (MiB)"
            }, {
                data: download,
                label: "Download (MiB)"
            }],
            chartOptions
        );
    }
}

function plotLoginsChart() {
    var element = $("#flot-logins-chart");
    if(element.length > 0) {
        $.plot(
            element,
            [{
                data: logins,
                label: "Number of logins"
            }],
            chartOptions
        );
    }
}

$(document).ready(function() {
    plotTransferDataChart();
    plotLoginsChart();
});