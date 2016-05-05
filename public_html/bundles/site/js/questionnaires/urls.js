$(function () {

    var urlsModal = $('#url-edit-create-modal');
    var urlsTable = $('#urls');
    urlsTable.DataTable(tableLanguage());

    // Clear modal values on page load.
    (function () {
        urlsModal.find('h4').text(null);
        urlsModal.find('input[name=username]').val(null);
        urlsModal.find('textarea[name=username]').val(null);
        urlsModal.find('input[name=id]').val(null);
    }) ();

    function setupModal(title, id, username) {
        urlsModal.find('h4').text(title);
        urlsModal.find('input[name=username]').val(username);
        urlsModal.find('input[name=id]').val(id);
        urlsModal.modal();
    }

    function collectData() {
        return {
            "username": urlsModal.find('input[name=username]').val(),
            "usernames": urlsModal.find('textarea[name=username]')
                .val()
                .replace(/\n/g, " ")
                .split(" "),

            "questionnaireId": urlsModal.find('input[name=questionnaire-id]').val(),
            "id": urlsModal.find('input[name=id]').val()
        };
    }

    $('#add-url').click(function () {
        urlsModal.find('.single-username').hide();
        urlsModal.find('.multiple-username').show();
        setupModal('Pridėti nuorodą');
    });

    urlsTable.find('.edit-url').click(function () {
        urlsModal.find('.single-username').show();
        urlsModal.find('.multiple-username').hide();

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