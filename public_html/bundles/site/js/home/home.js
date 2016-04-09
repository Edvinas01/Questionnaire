$(function () {

    $('.questionnaire-delete').click(function () {
        var id = $(this).data('id');

        bootbox.dialog({
            message: "Ar jūs tikrai norite pašalinti šį klausimyną?",
            title: "Pašalinti",
            buttons: {
                yes: {
                    label: "Pašalinti",
                    className: "btn-danger",
                    callback: function () {
                        $.ajax({
                            type: "DELETE",
                            url: "/moderate/questionnaire/" + id,
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
});