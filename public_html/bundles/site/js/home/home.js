$(function () {

    $('.questionnaire-delete').click(function () {
        var id = $(this).data('id');

        $.ajax({
            type: "DELETE",
            url: "/moderate/questionnaire/" + id,
            success: function () {
                location.reload();
            }
        });
    });
});