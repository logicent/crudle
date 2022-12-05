// $('.ui.form').on('beforeSubmit', '.ajax-submit', 
$('.ajax-submit').on('beforeSubmit',
    function () {
        var form = $(this);
        // You need to use standard javascript object here
        // MUST USE $(form)[0] in order to get _FILES in post
        // var formData = new FormData( $(form)[0] );
        $.ajax({
            type: form.attr('method'), // default: 'post'
            url: form.attr('action'),
            // data: formData,
            data: form.serializeArray(),
            // processData: false,
            // contentType: false,
        }).done(function (response) {
            if (response.success) {
                $('#page_sidebar a.item.active')[0].click();
                // renders success messages
                // form.yiiActiveForm('updateMessages', response.success, true);
            }
            else if (response.validation) {
                console.log(response.validation);
                // server validation failed
                // renders validation messages at appropriate places
                form.yiiActiveForm('updateMessages', response.validation, true);
            }
            else {
                // incorrect server response
                console.log('A server error was encountered');
            }
        }).fail(function () {
            // request failed
        });
        return false; // prevent default form submission
    }
);
