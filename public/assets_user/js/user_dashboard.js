"use strict";

// Class definition
var KTChartsWidget15 = (function () {
    // Private methods
    var initChart = function () {
        // Check if amchart library is included
        if (typeof am5 === "undefined") {
            return;
        }

        var element = document.getElementById("states_revenue_chart");

        if (!element) {
            return;
        }

        var root;

        var init = function() {
            // Create root element
            // https://www.amcharts.com/docs/v5/getting-started/#Root_element
            root = am5.Root.new(element);

            // Set themes
            // https://www.amcharts.com/docs/v5/concepts/themes/
            root.setThemes([am5themes_Animated.new(root)]);

            // Create chart
            // https://www.amcharts.com/docs/v5/charts/xy-chart/
            var chart = root.container.children.push(
                am5xy.XYChart.new(root, {
                    panX: false,
                    panY: false,
                    //wheelX: "panX",
                    //wheelY: "zoomX",
                    layout: root.verticalLayout,
                })
            );

            // Data
            var colors = chart.get("colors");

            var data = [
                {
                    month: "Jan",
                    visits: 725,
                    icon: "https://www.amcharts.com/wp-content/uploads/flags/united-states.svg",
                    columnSettings: {
                        fill: am5.color(KTUtil.getCssVariableValue('--kt-primary'))
                    }
                },
                {
                    month: "Feb",
                    visits: 625,
                    icon: "https://www.amcharts.com/wp-content/uploads/flags/united-kingdom.svg",
                    columnSettings: {
                        fill: am5.color(KTUtil.getCssVariableValue('--kt-primary'))
                    }
                },
                {
                    month: "Mar",
                    visits: 602,
                    icon: "https://www.amcharts.com/wp-content/uploads/flags/china.svg",
                    columnSettings: {
                        fill: am5.color(KTUtil.getCssVariableValue('--kt-primary'))
                    }
                },
                {
                    month: "Apr",
                    visits: 509,
                    icon: "https://www.amcharts.com/wp-content/uploads/flags/japan.svg",
                    columnSettings: {
                        fill: am5.color(KTUtil.getCssVariableValue('--kt-primary'))
                    }
                },
                {
                    month: "May",
                    visits: 322,
                    icon: "https://www.amcharts.com/wp-content/uploads/flags/germany.svg",
                    columnSettings: {
                        fill: am5.color(KTUtil.getCssVariableValue('--kt-primary'))
                    }
                },
                {
                    month: "Jun",
                    visits: 214,
                    icon: "https://www.amcharts.com/wp-content/uploads/flags/france.svg",
                    columnSettings: {
                        fill: am5.color(KTUtil.getCssVariableValue('--kt-primary'))
                    }
                },
                {
                    month: "Jul",
                    visits: 204,
                    icon: "https://www.amcharts.com/wp-content/uploads/flags/india.svg",
                    columnSettings: {
                        fill: am5.color(KTUtil.getCssVariableValue('--kt-primary')),
                    }
                },
                {
                    month: "Aug",
                    visits: 200,
                    icon: "https://www.amcharts.com/wp-content/uploads/flags/spain.svg",
                    columnSettings: {
                        fill: am5.color(KTUtil.getCssVariableValue('--kt-primary'))
                    }
                },
                {
                    month: "Sep",
                    visits: 165,
                    icon: "https://www.amcharts.com/wp-content/uploads/flags/italy.svg",
                    columnSettings: {
                        fill: am5.color(KTUtil.getCssVariableValue('--kt-primary'))
                    }
                },
                {
                    month: "Oct",
                    visits: 152,
                    icon: "https://www.amcharts.com/wp-content/uploads/flags/russia.svg",
                    columnSettings: {
                        fill: am5.color(KTUtil.getCssVariableValue('--kt-primary'))
                    }
                },
                {
                    month: "Nov",
                    visits: 125,
                    icon: "https://www.amcharts.com/wp-content/uploads/flags/norway.svg",
                    columnSettings: {
                        fill: am5.color(KTUtil.getCssVariableValue('--kt-primary'))
                    }
                },
                {
                    month: "Dec",
                    visits: 99,
                    icon: "https://www.amcharts.com/wp-content/uploads/flags/canada.svg",
                    columnSettings: {
                        fill: am5.color(KTUtil.getCssVariableValue('--kt-primary'))
                    }
                },
            ];

            // Create axes
            // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
            var xAxis = chart.xAxes.push(
                am5xy.CategoryAxis.new(root, {
                    categoryField: "month",
                    renderer: am5xy.AxisRendererX.new(root, {
                        minGridDistance: 30,
                    }),
                    bullet: function (root, axis, dataItem) {
                        return am5xy.AxisBullet.new(root, {
                            location: 0.5,
                            sprite: am5.Picture.new(root, {
                                width: 24,
                                height: 24,
                                centerY: am5.p50,
                                centerX: am5.p50,
                                src: dataItem.dataContext.icon,
                            }),
                        });
                    },
                })
            );

            xAxis.get("renderer").labels.template.setAll({
                paddingTop: 20,
                fontWeight: "400",
                fontSize: 14,
                fill: am5.color(KTUtil.getCssVariableValue('--kt-gray-500'))
            });

            xAxis.get("renderer").grid.template.setAll({
                disabled: true,
                strokeOpacity: 0
            });

            xAxis.data.setAll(data);

            var yAxis = chart.yAxes.push(
                am5xy.ValueAxis.new(root, {
                    renderer: am5xy.AxisRendererY.new(root, {}),
                })
            );

            yAxis.get("renderer").grid.template.setAll({
                stroke: am5.color(KTUtil.getCssVariableValue('--kt-gray-300')),
                strokeWidth: 1,
                strokeOpacity: 1,
                strokeDasharray: [3]
            });

            yAxis.get("renderer").labels.template.setAll({
                fontWeight: "400",
                fontSize: 14,
                fill: am5.color(KTUtil.getCssVariableValue('--kt-gray-500'))
            });

            // Add series
            // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
            var series = chart.series.push(
                am5xy.ColumnSeries.new(root, {
                    xAxis: xAxis,
                    yAxis: yAxis,
                    valueYField: "visits",
                    categoryXField: "month"
                })
            );

            series.columns.template.setAll({
                tooltipText: "{categoryX}: {valueY}",
                tooltipY: 0,
                strokeOpacity: 0,
                templateField: "columnSettings",
            });

            series.columns.template.setAll({
                strokeOpacity: 0,
                cornerRadiusBR: 0,
                cornerRadiusTR: 6,
                cornerRadiusBL: 0,
                cornerRadiusTL: 6,
            });

            series.data.setAll(data);

            // Make stuff animate on load
            // https://www.amcharts.com/docs/v5/concepts/animations/
            series.appear();
            chart.appear(1000, 100);
        }

        am5.ready(function () {
            init();
        });

        // Update chart on theme mode change
        KTThemeMode.on("kt.thememode.change", function() {
            // Destroy chart
            root.dispose();

            // Reinit chart
            init();
        });
    };

    // Public methods
    return {
        init: function () {
            initChart();
        },
    };
})();

// Webpack support
if (typeof module !== "undefined") {
    module.exports = KTChartsWidget15;
}

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTChartsWidget15.init();
});


"use strict";

// Class definition
var StateCharts = function () {
    var chart1 = {
        self: null,
        rendered: false
    };

    var chart2 = {
        self: null,
        rendered: false
    };

    var chart3 = {
        self: null,
        rendered: false
    };

    // Private methods
    var initChart = function(chart, toggle, chartSelector, data, initByDefault) {
        var element = document.querySelector(chartSelector);

        if (!element) {
            return;
        }

        var height = parseInt(KTUtil.css(element, 'height'));
        var labelColor = KTUtil.getCssVariableValue('--kt-gray-900');

        var borderColor = KTUtil.getCssVariableValue('--kt-border-dashed-color');

        var options = {
            series: [{
                name: 'Total Transactions',
                data: data
            }],
            chart: {
                fontFamily: 'inherit',
                type: 'bar',
                height: height,
                toolbar: {
                    show: false
                }
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: ['22%'],
                    borderRadius: 5,
                    dataLabels: {
                        position: "top" // top, center, bottom
                    },
                    startingShape: 'flat'
                },
            },
            legend: {
                show: false
            },
            dataLabels: {
                enabled: true,
                offsetY: -28,
                style: {
                    fontSize: '13px',
                    colors: [labelColor]
                }
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: ['Remittance', 'e-Wallet', 'Total Deman', 'Today Trans', 'November Trans', '2022 Trans'],
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false
                },
                labels: {
                    style: {
                        colors: KTUtil.getCssVariableValue('--kt-gray-500'),
                        fontSize: '13px'
                    }
                },
                crosshairs: {
                    fill: {
                        gradient: {
                            opacityFrom: 0,
                            opacityTo: 0
                        }
                    }
                }
            },
            yaxis: {
                labels: {
                    style: {
                        colors: KTUtil.getCssVariableValue('--kt-gray-500'),
                        fontSize: '13px'
                    }
                }
            },
            fill: {
                opacity: 1
            },
            states: {
                normal: {
                    filter: {
                        type: 'none',
                        value: 0
                    }
                },
                hover: {
                    filter: {
                        type: 'none',
                        value: 0
                    }
                },
                active: {
                    allowMultipleDataPointsSelection: false,
                    filter: {
                        type: 'none',
                        value: 0
                    }
                }
            },
            tooltip: {
                style: {
                    fontSize: '12px'
                }
            },
            colors: [KTUtil.getCssVariableValue('--kt-primary'), KTUtil.getCssVariableValue('--kt-primary-light')],
            grid: {
                borderColor: borderColor,
                strokeDashArray: 4,
                yaxis: {
                    lines: {
                        show: true
                    }
                }
            }
        };

        chart.self = new ApexCharts(element, options);
        var tab = document.querySelector(toggle);

        if (initByDefault === true) {
            // Set timeout to properly get the parent elements width
            setTimeout(function() {
                chart.self.render();
                chart.rendered = true;
            }, 200);
        }

        tab.addEventListener('shown.bs.tab', function (event) {
            if (chart.rendered === false) {
                chart.self.render();
                chart.rendered = true;
            }
        });
    }

    // Public methods
    return {
        init: function () {
            var chart1Data = [67000, 4444, 75000, 110000, 230000, 87000];
            initChart(chart1, '#state_chart_tab_1', '#state_chart_chart_1', chart1Data, true);

            var chart2Data = [52000, 67000, 37000, 65000, 87000, 150000, 467000, 700000, 83000, 68000, 200000, 320000];
            initChart(chart2, '#state_chart_tab_2', '#state_chart_chart_2', chart2Data, false);

            var chart3Data = [59000, 69000, 200000, 170000, 30000, 95000, 57000, 74000, 48000, 84000, 140000, 320000];
            initChart(chart3, '#state_chart_tab_3', '#state_chart_chart_3', chart3Data, false);

            // Update chart on theme mode change
            KTThemeMode.on("kt.thememode.change", function() {
                if (chart1.rendered) {
                    chart1.self.destroy();
                }

                if (chart2.rendered) {
                    chart2.self.destroy();
                }

                if (chart3.rendered) {
                    chart3.self.destroy();
                }

                initChart(chart1, '#state_chart_tab_1', '#state_chart_chart_1', chart1Data, chart1.rendered);
                initChart(chart2, '#state_chart_tab_2', '#state_chart_chart_2', chart2Data, chart2.rendered);
                initChart(chart3, '#state_chart_tab_3', '#state_chart_chart_3', chart3Data, chart3.rendered);
            });
        }
    }
}();

// Webpack support
if (typeof module !== 'undefined') {
    module.exports = StateCharts;
}

// On document ready
KTUtil.onDOMContentLoaded(function() {
    StateCharts.init();
});