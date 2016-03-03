$(function () {

    var questionnairesTable = $('#questionnaires-table');

    questionnairesTable.on('click', 'a.questionnaire-delete', function () {
        var id = $(this).closest('tr').data('id');
        $.ajax({
            type: "DELETE",
            url: "/questionnaires/" + id,
            success: function () {
                location.reload();
            }
        });
    });

    questionnairesTable.find('.questionnaire-visibility').click(function () {
        var id = $(this).closest('tr').data('id');
        var show = $(this).data('action')
            ;
        $.ajax({
            type: "POST",
            url: "/questionnaires/" + id + "/publish?show=" + show,
            success: function () {
                location.reload();
            }
        });
    });
});