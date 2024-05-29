"use strict";

// Class definition
var KTAppEcommerceSalesListing = function () {
    // Shared variables
    var table;
    var datatable;
    var flatpickr;
    var minDate, maxDate;

    // Private functions
    var initDatatable = function () {
        // Init datatable --- more info on datatables: https://datatables.net/manual/
        datatable = $(table).DataTable({
            "info": false,
            'order': [],
            'pageLength': 5,
            'columnDefs': [
                // { orderable: false, targets: 0 }, // Disable ordering on column 0 (checkbox)
                // { orderable: false, targets: 7 }, // Disable ordering on column 7 (actions)
            ]
        });

        // Re-init functions on datatable re-draws
        datatable.on('draw', function () {
            handleDeleteRows();
        });
    }

    // Init flatpickr --- more info :https://flatpickr.js.org/getting-started/
    var initFlatpickr = () => {
        const element = document.querySelector('#kt_ecommerce_sales_flatpickr');
        flatpickr = $(element).flatpickr({
            altInput: true,
            altFormat: "d/m/Y",
            dateFormat: "Y-m-d",
            mode: "range",
            onChange: function (selectedDates, dateStr, instance) {
                handleFlatpickr(selectedDates, dateStr, instance);
            },
        });
    }

    // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
    var handleSearchDatatable = () => {
        const filterSearch = document.querySelector('[data-kt-ecommerce-order-filter="search"]');
        filterSearch.addEventListener('keyup', function (e) {
            datatable.search(e.target.value).draw();
        });
    }

    // Handle status filter dropdown
    var handleStatusFilter = () => {
        const filterStatus = document.querySelector('[data-kt-ecommerce-order-filter="status"]');
        $(filterStatus).on('change', e => {
            let value = e.target.value;
            if (value === 'all') {
                value = '';
            }
            datatable.column(3).search(value).draw();
        });
    }

    // Handle flatpickr --- more info: https://flatpickr.js.org/events/
    var handleFlatpickr = (selectedDates, dateStr, instance) => {
        minDate = selectedDates[0] ? new Date(selectedDates[0]) : null;
        maxDate = selectedDates[1] ? new Date(selectedDates[1]) : null;

        // Datatable date filter --- more info: https://datatables.net/extensions/datetime/examples/integration/datatables.html
        // Custom filtering function which will search data in column four between two values
        $.fn.dataTable.ext.search.push(
            function (settings, data, dataIndex) {
                var min = minDate;
                var max = maxDate;
                var dateTransaction = new Date(moment($(data[7]).text(), 'YYYY-MM-DD'));

                if (
                    (min === null && max === null) ||
                    (min === null && max >= dateTransaction) ||
                    (min <= dateTransaction && max === null) ||
                    (min <= dateTransaction && max >= dateTransaction)
                ) {
                    return true;
                }
                return false;
            }
        );
        datatable.draw();
    }

    // Handle clear flatpickr
    var handleClearFlatpickr = () => {
        const clearButton = document.querySelector('#kt_ecommerce_sales_flatpickr_clear');
        clearButton.addEventListener('click', e => {
            flatpickr.clear();
        });
    }

    // Delete cateogry
    var handleDeleteRows = () => {
        // Select all delete buttons
        const deleteButtons = table.querySelectorAll('[data-kt-ecommerce-order-filter="delete_row"]');

        deleteButtons.forEach(d => {
            // Delete button on click
            d.addEventListener('click', function (e) {
                e.preventDefault();

                // Select parent row
                const parent = e.target.closest('tr');

                // Get category name
                const orderID = parent.querySelector('[data-kt-ecommerce-order-filter="order_id"]').innerText;

                // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
                Swal.fire({
                    text: "Are you sure you want to delete order: " + orderID + "?",
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "Yes, delete!",
                    cancelButtonText: "No, cancel",
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                        cancelButton: "btn fw-bold btn-active-light-primary"
                    }
                }).then(function (result) {
                    if (result.value) {
                        Swal.fire({
                            text: "You have deleted " + orderID + "!.",
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary",
                            }
                        }).then(function () {
                            // Remove current row
                            datatable.row($(parent)).remove().draw();
                        });
                    } else if (result.dismiss === 'cancel') {
                        Swal.fire({
                            text: orderID + " was not deleted.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary",
                            }
                        });
                    }
                });
            })
        });
    }


    // Hook export buttons
    var exportButtons = () => {
        const documentTitle = 'TRANSACTION REPORTS';
        var buttons = new $.fn.dataTable.Buttons(table, {
            buttons: [
                {
                    extend: 'copyHtml5',
                    title: documentTitle
                },
                {
                    extend: 'excelHtml5',
                    title: documentTitle
                },
                {
                    extend: 'csvHtml5',
                    title: documentTitle
                },
                {
                    extend: 'pdfHtml5',
                    title: documentTitle
                }
            ]
        }).container().appendTo($('#kt_ecommerce_report_views_export'));

        // Hook dropdown menu click event to datatable export buttons
        const exportButtons = document.querySelectorAll('#kt_ecommerce_report_views_export_menu [data-kt-ecommerce-export]');
        exportButtons.forEach(exportButton => {
            exportButton.addEventListener('click', e => {
                e.preventDefault();

                // Get clicked export value
                const exportValue = e.target.getAttribute('data-kt-ecommerce-export');
                const target = document.querySelector('.dt-buttons .buttons-' + exportValue);

                // Trigger click event on hidden datatable export buttons
                target.click();
            });
        });
    }


    // Public methods
    return {
        init: function () {
            table = document.querySelector('#user_transactions_list');

            if (!table) {
                return;
            }

            initDatatable();
            initFlatpickr();
            handleSearchDatatable();
            handleStatusFilter();
            handleDeleteRows();
            handleClearFlatpickr();
            exportButtons();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTAppEcommerceSalesListing.init();
});

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
                    month: "January",
                    visits: 725,
                    icon: "https://www.amcharts.com/wp-content/uploads/flags/united-states.svg",
                    columnSettings: {
                        fill: am5.color(KTUtil.getCssVariableValue('--kt-primary'))
                    }
                },
                {
                    month: "February",
                    visits: 625,
                    icon: "https://www.amcharts.com/wp-content/uploads/flags/united-kingdom.svg",
                    columnSettings: {
                        fill: am5.color(KTUtil.getCssVariableValue('--kt-primary'))
                    }
                },
                {
                    month: "March",
                    visits: 602,
                    icon: "https://www.amcharts.com/wp-content/uploads/flags/china.svg",
                    columnSettings: {
                        fill: am5.color(KTUtil.getCssVariableValue('--kt-primary'))
                    }
                },
                {
                    month: "April",
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
                    month: "June",
                    visits: 214,
                    icon: "https://www.amcharts.com/wp-content/uploads/flags/france.svg",
                    columnSettings: {
                        fill: am5.color(KTUtil.getCssVariableValue('--kt-primary'))
                    }
                },
                {
                    month: "July",
                    visits: 204,
                    icon: "https://www.amcharts.com/wp-content/uploads/flags/india.svg",
                    columnSettings: {
                        fill: am5.color(KTUtil.getCssVariableValue('--kt-primary')),
                    }
                },
                {
                    month: "August",
                    visits: 200,
                    icon: "https://www.amcharts.com/wp-content/uploads/flags/spain.svg",
                    columnSettings: {
                        fill: am5.color(KTUtil.getCssVariableValue('--kt-primary'))
                    }
                },
                {
                    month: "September",
                    visits: 165,
                    icon: "https://www.amcharts.com/wp-content/uploads/flags/italy.svg",
                    columnSettings: {
                        fill: am5.color(KTUtil.getCssVariableValue('--kt-primary'))
                    }
                },
                {
                    month: "October",
                    visits: 152,
                    icon: "https://www.amcharts.com/wp-content/uploads/flags/russia.svg",
                    columnSettings: {
                        fill: am5.color(KTUtil.getCssVariableValue('--kt-primary'))
                    }
                },
                {
                    month: "November",
                    visits: 125,
                    icon: "https://www.amcharts.com/wp-content/uploads/flags/norway.svg",
                    columnSettings: {
                        fill: am5.color(KTUtil.getCssVariableValue('--kt-primary'))
                    }
                },
                {
                    month: "December",
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
                categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
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
            var chart1Data = [54000, 42000, 75000, 110000, 230000, 87000, 50000, 44000, 88000, 64000, 120000, 32000];
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