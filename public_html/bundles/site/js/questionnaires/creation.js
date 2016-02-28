$(function () {

    var questionnaireId = $('#questionnaire').data('id');
    var questions = $('#questions');
    var selects = $(questions).find('select');

    function refresh(fast) {
        selects = $(questions).find('select');

        $.each(selects, function (i, obj) {

            var answerHolder = $(obj).parents('.question').children('.answers');
            var selection = $(obj).val();

            var show = false;
            if (selection == 'OPEN') {
                show = false;
            } else if (selection == 'SINGLE_SELECTION' || selection == 'SELECTION') {
                show = true;
            }

            if (show) {
                if (fast) {
                    answerHolder.show();
                } else {
                    answerHolder.fadeIn();
                }
            } else {
                if (fast) {
                    answerHolder.hide();
                } else {
                    answerHolder.fadeOut();
                }
            }
        });
    }

    // todo updating and saving, save before each action
    selects.on('change', function () {
        var id = $(this).closest('.question').data('id');

        console.log('change: ' + id);
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