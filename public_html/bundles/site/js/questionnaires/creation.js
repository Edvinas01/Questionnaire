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

    var questions = $('#questions');
    var answers = $('.answers');

    $('#save-questionnaire').click(function () {
        console.log(collectData());
    });

    $('#publish-questionnaire').click(function () {
        console.log('publish');
    });

    /**
     * Add a new question to and questionnaire.
     */
    questions.on('click', 'button.add-question', function () {
        $.ajax({
            type: "POST",
            url: "/questionnaires/" + questionnaireId + "/add-question",
            success: function (response) {
                questions.html(response);
            }
        });
    });

    /**
     * Remove question from questionnaire.
     */
    questions.on('click', 'button.remove-question', function () {
        var id = $(this).closest('.question').data('id');
        $.ajax({
            type: "POST",
            url: "/questions/" + id + "/remove",
            success: function (response) {
                questions.html(response);
            }
        });
    });

    /**
     * Add a new empty answer to the question.
     */
    questions.on('click', 'button.add-answer', function () {
        var answers = $(this).closest('.answers');
        var questionId = $(this).closest('.question').data('id');
        $.ajax({
            type: "POST",
            url: "/questions/" + questionId + "/add-answer",
            success: function (response) {
                answers.html(response);
            }
        });
    });

    /**
     * Remove answer.
     */
    questions.on('click', 'button.remove-answer', function () {
        var answers = $(this).closest('.answers');
        var id = $(this).closest('.answer').data('id');
        $.ajax({
            type: "POST",
            url: "/answers/" + id + "/remove",
            success: function (response) {
                answers.html(response);
            }
        });
    });
});