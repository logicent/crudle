// $('#setup').on('beforeSubmit', '.ajax-submit', 
$('.ajax-submit').on('beforeSubmit', 
    function () {
        var form = $(this);

        // You need to use standard javascript object here
        // MUST USE $('#upload_form')[0] in order to get _FILES in post
        // var formData = new FormData( $('#upload_form')[0] );

        $.ajax({
            // type: 'post',
            type: form.attr('method'),
            // url: $('#upload_form').attr('action'),
            url: form.attr('action'),
            // data: formData,
            data: form.serializeArray(),
            // processData: false,
            // contentType: false,
        })
            .done(function (response) {
                if (response.success)
                    $('#setup_sidebar a.item.active')[0].click();
                    // form.yiiActiveForm('updateMessages', response.success, true); // renders success messages

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
            });

    return false; // prevent default form submission
});
