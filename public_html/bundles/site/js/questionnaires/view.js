$(function () {

    var questionnaireId = $('.questionnaire').data('id');

    function collectData() {

        var answers = [];
        $('.question').each(function (i, question) {
            $(question).find('.answer').each(function (j, answer) {
                answers.push({
                    "id": $(answer).data('id'),
                    "checked": $(answer).is(':checked')
                });
            });
        });

        return {
            "answers": answers
        };
    }

    $('#submit').click(function () {
        $.ajax({
            type: "POST",
            data: JSON.stringify(collectData()),
            url: "/questionnaires-view/" + questionnaireId,
            success: function () {
                window.location.href = '/thanks';
            }
        });
    });
});