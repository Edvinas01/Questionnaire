$(function () {

    var questionnaireId = $('.questionnaire').data('id');

    function collectData() {

        var answers = [];
        $('.question').each(function (i, question) {
            $(question).find('.answer').each(function (j, answer) {
                var selection = $(answer);

                if (selection.data('type') == 'OPEN') {
                    answers.push({
                        "id": selection.data('id'),
                        "textAnswer": selection.val()
                    });
                } else {
                    answers.push({
                        "id": selection.data('id'),
                        "checked": selection.is(':checked')
                    });
                }
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