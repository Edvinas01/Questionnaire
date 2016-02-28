$(function () {

    var questionnaire = $('#questionnaire');
    var questionnaireId = questionnaire .data('id');
    var questionnaireDetails = questionnaire.find('.details');

    /**
     * Collect questionnaire data for saving to back-end.
     */
    function collectData() {

        // Collect the questions.
        var questions = [];
        $.each($('.question'), function (i, question) {

            // Collect the answers.
            var answers = [];
            $(question).find('.answer > input').each(function (i, answer) {
                answers.push({
                    "id": $(answer).data('id'),
                    "content": $(answer).val()
                });
            });

            // Store answers.
            questions.push({
                "id": $(question).data('id'),
                "content": $(question).find('.description').val(),
                "type": $(question).find('.type').val(),
                "answers": answers
            });
        });

        // Store full questionnaire data.
        return {
            "id": questionnaireId,
            "questions": questions,
            "name": $(questionnaireDetails).find('.name').val(),
            "expires": $(questionnaireDetails).find('.expires').val()
        };
    }

    $('#save-questionnaire').click(function () {
        console.log(collectData());
    });

    $('#publish-questionnaire').click(function () {
        console.log('publish');
    });

    /**
     * Add a new question to and questionnaire.
     */
    $('.add-question').click(function () {
        $.ajax({
            type: "POST",
            url: "/questionnaires/" + questionnaireId + "/add-question",
            success: function () {
                location.reload();
            }
        });
    });

    /**
     * Remove question from questionnaire.
     */
    $('.remove-question').click(function () {
        var id = $(this).closest('.question').data('id');
        $.ajax({
            type: "POST",
            url: "/questions/" + id + "/remove",
            success: function () {
                location.reload();
            }
        });
    });

    /**
     * Add a new empty answer to the question.
     */
    $('.add-answer').click(function () {
        var questionId = $(this).closest('.question').data('id');
        $.ajax({
            type: "POST",
            url: "/questions/" + questionId + "/add-answer",
            success: function () {
                location.reload();
            }
        });
    });

    /**
     * Remove answer.
     */
    $('.remove-answer').click(function () {
        var id = $(this).closest('.answer').data('id');
        $.ajax({
            type: "POST",
            url: "/answers/" + id + "/remove",
            success: function () {
                location.reload();
            }
        });
    });
});