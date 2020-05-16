//Flot Line Chart
var ticks = [[0,"Jan"],[1,"Feb"],[2,"Mar"],[3,"Apr"],[4,"May"],[5,"Jun"],[6,"Jul"],[7,"Aug"],[8,"Sep"],[9,"Oct"],[10,"Nov"],[11,"Dec"]];
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
            xaxis: {
                ticks:ticks
            },
            tooltip: true,
            tooltipOpts: {
                content: "%s view: %y",
                shifts: {
                    x: -60,
                    y: 25
                }
            }
        };

        var plotObj = $.plot($("#flot-line-chart"), [{
                data: topclassview,
                label: "Leading class page views"
            }, {
                data: ourview,
                label: "Our page views"
            }],
            options);
    }
});

//Flot Line Chart
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
            xaxis: {
                ticks:ticks
            },
            tooltip: true,
            tooltipOpts: {
                content: "%s %y",
                shifts: {
                    x: -60,
                    y: 25
                }
            }
        };

        var plotObj = $.plot($("#flot-line-chart1"), [{
                data: admittedstudent,
                label: "Admitted students"
            }, {
                data: ourview,
                label: "Page views"
            }],
            options);
    }
});

//Flot Pie Chart
$(function() {

    var data = [{
        label: "Science",
        data: 50
    }, {
        label: "Commerce",
        data: 30
    }, {
        label: "Arts",
        data: 10
    }, {
        label: "Others",
        data: 10
    }];

    var plotObj = $.plot($("#flot-pie-chart"), data, {
        series: {
            pie: {
                show: true
            }
        },
        grid: {
            hoverable: true
        },
        tooltip: true,
        tooltipOpts: {
            content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
shifts: {
                x: 30,
                y: 0
            },
            defaultTheme: false
        }
    });

});




//Flot Bar Chart
var ticks = [[0,"Jan"],[1,"Feb"],[2,"Mar"],[3,"Apr"],[4,"May"],[5,"Jun"],[6,"Jul"],[7,"Aug"],[8,"Sep"],[9,"Oct"],[10,"Nov"],[11,"Dec"]];
$(function() {

    var barOptions = {
        series: {
            bars: {
                align: "center",
                show: true,
                barWidth: 0.5
            }
        },
        xaxis: {         
            ticks: ticks
        },
        grid: {
            hoverable: true
        },
        legend: {
            show: false
        },
        tooltip: true,
        tooltipOpts: {
            content: "x: %x, y: %y views"
        }
    };
    var barData = {
        label: "bar",
        data:ourview
    };
    $.plot($("#flot-bar-chart"), [barData], barOptions);

});
