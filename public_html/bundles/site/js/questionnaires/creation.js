$(function () {

    var questionnaire = $('#questionnaire');
    var questionnaireName = questionnaire.find('h1.questionnaire-name');
    var questionnaireId = questionnaire .data('id');
    var questionnaireDetails = questionnaire.find('.details');

    function setupQuestionByType(link) {
        var question = $(link).parents('.question');
        var changedTo = $(link).val();

        var container = question.find('.question-text');
        var answers = question.find('.answers');

        if (changedTo == 'OPEN') {
            answers.hide(0, '', function () {
                container.removeClass('col-md-7');
                container.addClass('col-md-12');
            });
        } else {
            container.removeClass('col-md-12');
            container.addClass('col-md-7');
            answers.show();
        }
    }

    function setupSelects() {
        $('.type-select').each(function (i, obj) {
            setupQuestionByType($(obj));
        });
    }

    questionnaire.on('change', 'select.type-select', function () {
        setupQuestionByType($(this));
    });

    /**
     * Initialization for type selects.
     */
    setupSelects();

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
            "description": $(questionnaireDetails).find('.description').val(),
            "name": $(questionnaireDetails).find('.name').val(),
            "expires": $(questionnaireDetails).find('.expires').val()
        };
    }

    function notify(title, message, type) {
        $.notify({
            icon: 'glyphicon glyphicon-info-sign',
            title: title,
            message: message
        },{
            type: type == null ? "success" : type,
            delay: 2000,
            allow_dismiss: true,
            newest_on_top: false,
            placement: {
                from: "bottom",
                align: "right"
            },
            animate: {
                enter: 'animated fadeIn',
                exit: 'animated fadeOut'
            }
        });
    }

    var questions = $('#questions');
    var answers = $('.answers');

    /**
     * Save changes of questionnaire and reload page.
     */
    $('#save-questionnaire').click(function () {
        $.ajax({
            type: "POST",
            data: JSON.stringify(collectData()),
            url: "/questionnaires/" + questionnaireId,
            success: function () {
                location.reload();
            }
        });
    });

    questionnaire.find('.questionnaire-visibility').click(function () {
        var show = $(this).data('action');
        var isShow = show == 'show';

        // show
        bootbox.dialog({
            message: 'Ar jūs tikrai norite ' + (isShow ? 'publikuoti' : 'slėpti') + ' savo klausimyną?',
            title: isShow ? 'Publikuoti'  : "Slėpti",
            buttons: {
                yes: {
                    label: isShow ? 'Publikuoti' : 'Slėpti',
                    className: "btn-success",
                    callback: function () {
                        $.ajax({
                            type: "POST",
                            data: JSON.stringify(collectData()),
                            url: "/questionnaires/" + questionnaireId + "/publish?show=" + show,
                            success: function () {
                                location.reload();
                            }
                        });
                    }
                },
                no: {
                    label: "Atšaukti",
                    className: "btn-danger"
                }
            }
        });
    });

    /**
     * Update the name header dynamically.
     */
    $('input.name').keyup(function() {
        questionnaireName.html('Editing "' + $(this).val() + '"');
    });

    /**
     * Add a new question to the questionnaire.
     */
    questions.on('click', 'button.add-question', function () {
        $.ajax({
            type: "POST",
            data: JSON.stringify(collectData()),
            url: "/questionnaires/" + questionnaireId + "/add-question",
            success: function (response) {
                questions.html(response);

                setupSelects();
                notify('Pridėta: ', 'Sukurtas naujas klausimas');
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
            data: JSON.stringify(collectData()),
            url: "/questions/" + id + "/remove",
            success: function (response) {
                questions.html(response);

                setupSelects();
                notify('Pašalinta: ', 'Klausimas pašalintas');
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
            data: JSON.stringify(collectData()),
            url: "/questions/" + questionId + "/add-answer",
            success: function (response) {
                answers.html(response);

                notify('Pridėta: ', 'Pridėtas naujas atsakymo variantas');
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
            data: JSON.stringify(collectData()),
            url: "/answers/" + id + "/remove",
            success: function (response) {
                answers.html(response);

                notify('Pašalinta: ', 'Pašalintas atsakymo variantas');
            }
        });
    });
});