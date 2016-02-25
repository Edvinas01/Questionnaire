$(function () {

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

    refresh(true);

    selects.on('change', function () {
        refresh();
    });
});