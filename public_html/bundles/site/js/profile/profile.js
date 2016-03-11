$(function () {

    var questionnairesTable = $('#questionnaires-table');

    questionnairesTable.on('click', 'a.questionnaire-delete', function () {
        var id = $(this).closest('tr').data('id');

        bootbox.dialog({
            message: 'Are you sure you want to delete this questionnaire?',
            title: 'Delete',
            buttons: {
                yes: {
                    label: 'Delete',
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
                    label: "Cancel",
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
            message: 'Are you sure you want to ' + (isShow ? 'publish' : 'hide') + ' your questionnaire?',
            title: isShow ? 'Publish'  : "Hide",
            buttons: {
                yes: {
                    label: isShow ? 'Publish' : 'Hide',
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
                    label: "Cancel",
                    className: "btn-danger"
                }
            }
        });
    });
});