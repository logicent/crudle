// $('.ui.form').on('beforeSubmit', '.ajax-submit', 
$('.button.action').on('click',
    function () {
        var form = $(this).parents('.ui.form');
        // To-Do: check if form has file input elements

        // MUST USE $(form)[0] in order to get _FILES in post
        // var formData = new FormData($(form)[0]);
        // if (hasFileInput)
        //     data = new FormData($(form)[0]);
        // else
            data = form.serializeArray();

        $.ajax({
            type: $(this).data('method'), // default: 'post'
            url: $(this).data('url'),
            data: data,
            // processData: false,
            // contentType: false,
        }).done(function (response) {
            if (response.success) {
                $('#page_sidebar a.item.active')[0].click();
                // renders success messages
                form[0].yiiActiveForm('updateMessages', response.success, true);
            }
            else if (response.validation) {
                console.log(response.validation);
                // server validation failed
                // renders validation messages at appropriate places
                form[0].yiiActiveForm('updateMessages', response.validation, true);
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
