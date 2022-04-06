$('.show-related-text').on('click', function() 
{
    el_relatedText = $(this);
    fieldId = '#' + $(this).data('field-id');
    if ( $(fieldId).val() == '' || $(fieldId).val() == ' ') // use space char for empty selection
        return false;
    // only fetch if parent is not null
    $.ajax({
        url: $(this).data('url'),
        type: 'get',
        data: {
            'model_class': $(this).data('model-class'),
            'field_id': $(fieldId).val(),
            'text_col': $(this).data('text-col'),
        },
        success: function( response )
        {
            el_relatedText.val( response );
        },
        error: function( jqXhr, textStatus, errorThrown )
        {
            console.log( errorThrown );
        }
    });
});