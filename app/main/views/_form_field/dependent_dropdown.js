// $('.ui.dropdown.search.selection').on('change', function() 
$('.dependent-dropdown').on('change', function() 
{
    select_el = $(this).find('select');

    if (select_el.val() == '')
        return false;
    
    dependentField = $('#' + select_el.data('dependent-field-id'));

    $.ajax({
        url: select_el.data('dependent-field-url'),
        type: 'get',
        data: {
            'source': $('#source').val(), // replace with dynamic selectorId
            'data_filter': select_el.val()
        },
        success: function( response )
        {
            dependentField.html( response );
            $('.show-related-text')[select_el.data('dependent-description-index')].click();
        },
        error: function( jqXhr, textStatus, errorThrown )
        {
            console.log( errorThrown );
        }
    });
});