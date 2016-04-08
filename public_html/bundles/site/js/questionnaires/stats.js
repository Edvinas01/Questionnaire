$(function () {

    // Questionnaire id.
    var id = $('.questionnaire').data('id');
    var questionHolders = $('.questions');

    function loadCharts(callback) {
        $.ajax({
            url: '/questionnaires-stats/' + id + '/json',
            type: "GET",
            dataType: "json",
            success: function (data) {
                typeof callback === 'function' && callback(JSON.parse(data));
            }
        });
    }

    function pieChart(container, data) {

        var allZero = true;
        $.each(data, function (i, obj) {
            if (obj.y != 0) {
                allZero = false;
            }
        });

        if (allZero) {
            console.warn('Nothing to draw for pie chart');
            return;
        }

        $(container).highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            credits: {
                enabled: false
            },
            title: {
                text: ''
            },
            tooltip: {
                pointFormat: '<b>{point.percentage:.1f}%</b> iš dalyvių pažymėjo taip'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                colorByPoint: true,
                data: data
            }]
        });
    }

    function columnChart(container, titles, trueCount, falseCount) {
        $(container).highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: ''
            },
            credits: {
                enabled: false
            },
            xAxis: {
                categories: titles,
                crosshair: true
            },
            yAxis: {
                min: 0,
                allowDecimals: false,
                title: {
                    text: 'Atsakymai'
                }
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Taip',
                data: trueCount

            }, {
                name: 'Ne',
                data: falseCount
            }]
        });
    }

    loadCharts(function (data) {
        $(questionHolders).each(function (val, obj) {

            var titles = [];
            var trueCount = [];
            var falseCount = [];
            var truePercentages = [];

            $(data[val]).each(function (i, question) {

                $(question.answerStats).each(function (j, answer) {

                    // For column charts.
                    titles.push(answer.title);
                    trueCount.push(answer.trueCount);
                    falseCount.push(answer.falseCount);

                    // For pie charts.
                    truePercentages.push({
                        "y": answer.truePercentage,
                        "name": answer.title
                    });
                });
            });

            var type = $(obj).data('type');
            if (type == 'SINGLE') {
                pieChart(obj, truePercentages);
            } else if (type == 'MULTIPLE') {
                columnChart(obj, titles, trueCount, falseCount);
            }
        });
    });

    $('.open-answer').each(function (i, table) {
        $(table).DataTable();
    });

    $('.show-opinions').click(function () {
        $(this).closest('div').find('.opinions-modal').modal();
    });
});