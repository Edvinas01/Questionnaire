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
});