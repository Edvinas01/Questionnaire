$(function () {

    var questionnairesTable = $('#questionnaires-table');

    questionnairesTable.on('click', 'a.questionnaire-delete', function () {
        var id = $(this).closest('tr').data('id');

        bootbox.dialog({
            message: 'Ar jūs tikrai norite ištrinti šį klausimyną?',
            title: 'Trinti',
            buttons: {
                yes: {
                    label: 'Trinti',
                    className: "btn-danger",
                    callback: function () {
                        $.ajax({
                            type: "DELETE",
                            url: "/questionnaires/" + id,
                            success: function () {
                                location.reload();
                            }
                        });
                    }
                },
                no: {
                    label: "Atšaukti",
                    className: "btn-success"
                }
            }
        });
    });

    questionnairesTable.find('.questionnaire-visibility').click(function () {
        var id = $(this).closest('tr').data('id');
        var show = $(this).data('action');

        var isShow = show == 'show';

        bootbox.dialog({
            message: 'Ar jūs tikrai norite ' + (isShow ? 'publikuoti' : 'slėpti') + ' šį klausimyną?',
            title: isShow ? 'Publikuoti'  : "Slėpti",
            buttons: {
                yes: {
                    label: isShow ? 'Publikuoti' : 'Slėpti',
                    className: "btn-success",
                    callback: function () {
                        $.ajax({
                            type: "POST",
                            url: "/questionnaires/" + id + "/publish?ignore=true&show=" + show,
                            success: function () {
                                location.reload();
                            }
                        });
                    }
                },
                no: {
                    label: "Ašaukti",
                    className: "btn-danger"
                }
            }
        });
    });
});