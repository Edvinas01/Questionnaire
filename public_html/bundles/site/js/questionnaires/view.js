$(function () {

    var questionnaireId = $('.questionnaire').data('id');
    var urlId = $('input[name=url]').val();

    function collectData() {

        var answers = [];
        $('.question').each(function (i, question) {

            var other = $(question).find('.other');
            if (other.val()) {
                answers.push({
                    "other": other.val(),
                    "questionId": $(question).data('id')
                });

                // Continue.
                return true;
            }

            $(question).find('.answer').each(function (j, answer) {
                var selection = $(answer);

                if (selection.data('type') == 'OPEN') {
                    answers.push({
                        "textAnswer": selection.val(),
                        "questionId": selection.data('question-id')
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
            "answers": answers,
            "urlId": urlId
        };
    }

    $('#questions-form').submit(function (e) {
        $.ajax({
            type: "POST",
            data: JSON.stringify(collectData()),
            url: "/questionnaires-view/" + questionnaireId,
            success: function () {
                window.location.href = '/thanks';
            }
        });
        e.preventDefault();
    });

    function modifyClosestOptions(link, enable) {
        $(link).parents('.answers').find('.answer').each(function (i, obj) {
            if (!$(obj).is(':checkbox')) {
                $(obj).prop('required', enable);
            }

            var full = $(obj).parents('span');
            if (enable) {
                full.show();
            } else {
                full.hide();
            }
        });
    }

    // The other 'opinion' field.
    var other = $('.other');

    // Initialize.
    other.each(function (i, obj) {
        modifyClosestOptions($(obj), !$(obj).val())
    });

    other.on('input', function () {
        var value = $(this).val();

        if (value) {
            modifyClosestOptions($(this), false);
        } else {
            modifyClosestOptions($(this), true);
        }
    });
});