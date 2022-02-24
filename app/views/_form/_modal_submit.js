$('.modal-form').on('beforeSubmit', function () {
    var form = $(this);
    var dialog = $('#' + $(this).data('modal_id'));

    $.ajax({
        type: form.attr('method'),
        url: form.attr('action'),
        data: form.serializeArray(),
    })
        .done(function (response) {
            if (response.success) {
                dialog.modal('hide');
                // trigger auto refresh of grid if applicable
                if ( $('a.item.active').length > 0 )
                    $('a.item.active')[0].click();
                else
                    location.reload();
            }
            else if (response.validation) {
                console.log(response.validation);
                // server validation failed
                form.yiiActiveForm('updateMessages', response.validation, true); // renders validation messages at appropriate places
            }
            else {
                // incorrect server response
                console.log('A server error was encountered');
            }
        })
        .fail(function () {
            // request failed
        })
    return false; // prevent default form submission
});
