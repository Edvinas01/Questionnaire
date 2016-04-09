$(function () {

    var users = $('#users');
    var modal = $('#edit-create-modal');

    users.DataTable(tableLanguage());

    function collectData() {
        return {
            "id": modal.find('input[name=id]').val(),
            "username": modal.find('input[name=username]').val(),
            "email": modal.find('input[name=email]').val(),
            "role": modal.find('select[name=role]').val()
        }
    }

    $('.user-delete').click(function () {
        var id = $(this).parents('tr').data('id');

        bootbox.dialog({
            message: "Ar jūs tikrai norite pašalinti šią paskyrą?",
            title: "Pašalinti",
            buttons: {
                yes: {
                    label: "Pašalinti",
                    className: "btn-danger",
                    callback: function () {
                        $.ajax({
                            type: "DELETE",
                            url: "/users/" + id,
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

    $('.user-edit').click(function () {
        var id = $(this).parents('tr').data('id');

        $.ajax({
            url: '/users/' + id,
            type: "GET",
            dataType: "json",
            success: function (response) {
                var data = JSON.parse(response);

                modal.find('.modal-title').html('Editing ' + data.username);
                modal.find('input[name=id]').val(data.id);
                modal.find('input[name=username]').val(data.username);
                modal.find('input[name=email]').val(data.email);
                modal.find('select[name=role]').val(data.role);
                modal.modal();
            }
        });
    });

    $('#save-user').click(function () {
        var data = collectData();
        $.ajax({
            type: "POST",
            data: JSON.stringify(data),
            url: '/users/' + data.id,
            success: function () {
                location.reload();
            }
        });
    });
});