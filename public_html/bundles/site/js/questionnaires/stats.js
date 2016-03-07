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
                console.log(data);
                typeof callback === 'function' && callback(JSON.parse(data));
            }
        });
    }

    loadCharts(function (data) {

        $(questionHolders).each(function (val, obj) {

            var titles = [];
            var trueCount = [];
            var falseCount = [];

            $(data[val]).each(function (i, question) {

                $(question.answerStats).each(function (j, answer) {
                    titles.push(answer.title);
                    trueCount.push(answer.trueCount);
                    falseCount.push(answer.falseCount);
                });
            });

            $(obj).highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: data[val].title
                },
                xAxis: {
                    categories: titles,
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Answers'
                    }
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: [{
                    name: 'Yes',
                    data: trueCount

                }, {
                    name: 'No',
                    data: falseCount
                }]
            });
        });
    });
});