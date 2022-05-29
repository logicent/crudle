$('.load-related-list-options').on('change', function() 
{
    el_select = $(this).children('select');
    relatedField = $(el_select).data('dependent_field_ref');
    if ($(el_select).data('dependent_field_count') == 'one')
        el_relatedField = $('#' + relatedField);
    else
        el_relatedField = $('.' + relatedField);

    if ( $(el_select).val() == '' || $(el_select).val() == ' ') // use space char for empty selection
        return false;

    $.ajax({
        url: $(el_select).data('url'),
        type: 'get',
        data: {
            'list_item': $(el_select).val(),
        },
        success: function( response )
        {
            // htmlOptions = [];
            // listOptions = JSON.parse(response);
            // foreach (listOption in listOptions)
            // {
            //     htmlOption = '<option value="">' + listOption + '</option>';
            //     console.log(htmlOption);
            //     htmlOptions.push(htmlOption);
            // }
            // el_relatedField.html( htmlOptions );
            el_relatedField.html( response );
        },
        error: function( jqXhr, textStatus, errorThrown )
        {
            console.log( errorThrown );
        }
    });
});