$('.load-form-modal').on('click', function(e)
{
    e.stopPropagation();
    modal_id = $(this).data('modal_id');

    $.ajax({
        url: $(this).attr('href'),
        type: 'get',
        data: {
            // _csrf: yii.getCsrfToken(),
        },
        success: function( response )
        {
            $('#' + modal_id + ' .content').html( response );
            $('#' + modal_id).modal({
                centered: false,
            })
            .modal('show')
        },
        error: function( jqXhr, textStatus, errorThrown )
        {
            console.log( errorThrown );
        }
    });
    return false;
});
