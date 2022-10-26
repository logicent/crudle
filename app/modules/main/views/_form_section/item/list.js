$('.ui.modals').on('click', '.update-row',
    function(ev) {
        el_button = $(this);
        sl_table_id = '#' + el_button.data('table-id');
        sl_modal_id = '#' + el_button.data('table-id') + '__modal';
        // formData = new FormData( document.getElementById(el_button.data('table-id') + '__modal');

        el_tr = $(sl_table_id).find('tr[data-row-id="' + el_button.data('row-id') + '"]');

        el_tr_inputs = el_tr.children('td').children('input');
        el_form_inputs = $(sl_modal_id).find('input');
        el_form_inputs.each(function(ix, el){
            el_tr_input = el_tr.find('input[name="' + $(this).attr('name') + '"]');
            el_tr_input.val($(this).val());
        });

        el_tr_selects = el_tr.children('td').children('select');
        el_form_selects = $(sl_modal_id).find('select');
        el_form_selects.each(function(ix, el){
            el_tr_select = el_tr.find('select[name="' + $(this).attr('name') + '"]');
            el_tr_select.find('option[value="' + $(this).val() + '"]').attr('selected', 'selected');
        });
        // close the modal form
        $(sl_modal_id).closest('.ui.modal').modal('hide');
    });

$('table.in-form').on('click', '.edit-row',
    function(ev) {
        el_tr = $(this).closest('tr');
        el_table_div = el_tr.closest('table').parent('div');
        modal_id = el_table_div.attr('id') + '__modal';

        el_tr_inputs = el_tr.children('td').children('input');
        el_tr_selects = el_tr.children('td').children('select');

        tr_fields = [];
        el_tr_inputs.each(function(){
            field = { 'name': $(this).attr('name'), 'value': $(this).val()};
            tr_fields.push(field);
        });
        el_tr_selects.each(function(){
            field = { 'name': $(this).attr('name'), 'value': $(this).val()};
            tr_fields.push(field);
        });

        _modal_form = $(this).data('modal-form');
        if (typeof(_modal_form) === 'undefined')
            _modal_form = el_table_div.attr('id') + '/field_inputs';

        $.ajax({
            url: js_listParams.edit_row_url,
            type: 'post',
            data: {
                '_model_class'  : el_table_div.find('.add-row').data('model-class'),
                '_modal_form'   : _modal_form,
                '_row_inputs'   : el_table_div.attr('id') + '/_row_inputs',
                '_row_values'   : tr_fields,
                '_row_counter'  : el_tr.data('row-id'),
            },
            success: function( response )
            {
                $('#' + modal_id + ' .content').html( response ); // Target '.content' to keep close button in modal
                $('#' + modal_id).modal({
                                    centered: false,
                                    closable : false
                                })
                                .modal('show'); // !!! Use the modal#id not '.ui.modal' to avoid load issues
            },
            error: function( jqXhr, textStatus, errorThrown )
            {
                console.log( errorThrown );
            }
        });
        return false;
    });

$('table.in-form tbody').on('click', 'input.pikadaytime',
    function(ev) {
        $(this).flatpickr({
            // hourIncrement : 1,
            minuteIncrement: 15,
            enableTime: true
        });
    });

$('table.in-form tbody').on('change', 'select.list-option',
    function(ev) {
        ev.stopPropagation();

        if ($(this).val() == '')
            return false;

        el_tr = $(this).closest('tr');

        $.ajax({
            url: js_listParams.getUrl,
            type: 'get',
            data: {
                'item_id': $(this).val()
            },
            success: function(item) {

            },
            error: function(jqXhr, textStatus, errorThrown) {
                console.log(errorThrown);
            }
        });
    });

$('table.in-form tbody').on('change', 'td > input',
    function(ev) {
        ev.stopPropagation();

        if ($(this).val() == '')
            return false;

        el_tr = $(this).closest('tr');
    });

$('table.in-form').on('click',  'th.select-all-rows > .ui.checkbox',
    function(ev) {
        select_all_rows = $(this).find('input').is(':checked');
        all_rows = $(this).parents('table').find('td.select-row input');
        del_row = $(this).parents('table').siblings('.del-row');

        if (select_all_rows) {
            del_row.show();
            all_rows.each(
                function(ev) {
                    $(this).prop('checked', true);
                }
            );
        }
        else {
            del_row.hide();
            all_rows.each(
                function(ev) {
                    $(this).prop('checked', false);
                }
            );
        }
    });

$('.add-row').on('click',
    function(ev) {
        ev.stopPropagation();
        el_table_div = $(this).parent('div')
        at_table_id = el_table_div.attr('id')
        el_table = el_table_div.find('table');
        el_tbody = el_table_div.find('tbody');
        vl_trCount = el_table_div.find('tbody > tr').not('#no_data').length

        $.ajax({
            url: js_listParams.add_row_url,
            type: 'get',
            data: {
                '_model_class': $(this).data('model-class'),
                '_row_inputs': at_table_id + '/_row_inputs',
                '_row_counter': vl_trCount
            },
            success: function(response) {
                el_tbody.find('tr#no_data').hide();
                el_tbody.append(response);

                displaySelectAllCheckboxIf(el_table);
            },
            error: function(jqXhr, textStatus, errorThrown) {
                console.log(errorThrown);
            }
        });
    });

$('table.in-form tbody').on('click', 'td.select-row > .ui.checkbox',
    function(ev) {
        select_all_rows = $(this).parents('table').find('th.select-all-rows > .ui.checkbox > input');
        selected_rows = $(this).parents('table').find('.select-row input:checked').length;
        all_rows = $(this).parents('tbody').find('.select-row input:checkbox').length;
        del_row = $(this).parents('table').siblings('.del-row');

        if (selected_rows == 0) {
            select_all_rows.prop('checked', false);
            del_row.hide();
        }
        else
            del_row.show();

        if (selected_rows < all_rows)
            select_all_rows.prop('checked', false);
        else
            select_all_rows.prop('checked', true);
    });

$('.del-row').on('click',
    function(ev) {
        $(this).css('display', 'none');
        el_table = $(this).siblings('table.in-form');
        selected_rows = el_table.find('td.select-row > .ui.checkbox > input:checked');

        selected_rows.each(
            function(ev) {
                el_tr = $(this).parents('tr');
                el_tr.remove();
            });
        displaySelectAllCheckboxIf(el_table);
    });

function displaySelectAllCheckboxIf(el_table)
{
    cb_select_all_rows = el_table.find('thead th.select-all-rows .ui.checkbox');
    cb_select_all_rows.find('input').prop('checked', false);

    vl_trCount = el_table.find('tbody > tr').not('#no_data').length;
    if (vl_trCount == 0) {
        el_table.find('tbody > tr#no_data').show();
        cb_select_all_rows.hide();
    }
    else {
        cb_select_all_rows.show();
    }
}