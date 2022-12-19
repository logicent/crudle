$('.show-export-form').on('click', function(e)
{
    e.stopPropagation();

    $.ajax({
        url: $(this).attr('href'),
        type: 'get',
        data: {
        },
        success: function( response )
        {
            $('#report').html(response);
        },
        error: function( jqXhr, textStatus, errorThrown )
        {
            console.log( errorThrown );
        }
    });
    return false;
});
