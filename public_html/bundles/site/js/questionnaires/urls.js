$(function () {

    var urlsModal = $('#url-edit-create-modal');
    var urlsTable = $('#urls');
    urlsTable.DataTable(tableLanguage());

    function setupModal(title, id, username) {
        urlsModal.find('h4').text(title);
        urlsModal.find('input[name=username]').val(username);
        urlsModal.find('input[name=id]').val(id);
        urlsModal.modal();
    }

    function collectData() {
        return {
            "username": urlsModal.find('input[name=username]').val(),
            "questionnaireId": urlsModal.find('input[name=questionnaire-id]').val(),
            "id": urlsModal.find('input[name=id]').val()
        };
    }

    $('#add-url').click(function () {
        setupModal('Pridėti nuorodą');
    });

    urlsTable.find('.edit-url').click(function () {
        var id = $(this).data('id');
        $.getJSON('/urls/' + id, function (data) {
            setupModal('Pridėti nuorodą', id, data.username);
        });
    });

    urlsTable.find('.remove-url').click(function () {
        var id = $(this).data('id');
        $.ajax({
            type: "DELETE",
            url: "/urls/" + id,
            success: function () {
                location.reload();
            }
        });
    });

    $('#submit-url').click(function () {
        var url = collectData();

        if (url.id) {

            // Existing url.
            $.ajax({
                type: "POST",
                data: JSON.stringify(collectData()),
                url: "/urls/" + url.id,
                success: function () {
                    location.reload();
                }
            });
        } else {

            // New url.
            $.ajax({
                type: "POST",
                data: JSON.stringify(collectData()),
                url: "/urls",
                success: function () {
                    location.reload();
                }
            });
        }
    });
});