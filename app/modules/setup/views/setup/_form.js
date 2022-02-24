$('.show-list-form').on('click', function(e)
{
    e.stopPropagation();

    $.ajax({
        url: $(this).attr('href'),
        type: 'get',
        data: {
            // _csrf: yii.getCsrfToken(),
        },
        success: function( response )
        {
            $('#setup').html(response);
        },
        error: function( jqXhr, textStatus, errorThrown )
        {
            console.log( errorThrown );
        }
    });
    return false;
});
