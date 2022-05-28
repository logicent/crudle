$('.ui.modals').on('click', '.update-row',
    function (e) {
        update_btn = $(this);
        table_row = $('#' + update_btn.data('row-id'));
        row_inputs = table_row.children('td').children('input');
        // row_checkbox = table_row.children('td').children('div').children('input[type="hidden"]');
        // formData = new FormData( document.getElementById(update_btn.data('row-id') + '__modal'));
        form_inputs = $('#' + update_btn.data('row-id') + '__modal').find('input');
        modal_id = table_row.attr('id') + '__modal';

        form_inputs.each(function(){
            input = table_row.find('input[data-name=' + $(this).data('name') + ']');
            input.val($(this).val());
        });
        // close the modal form
        $('#' + modal_id).parents('.ui.modal').modal('hide');
    });

$('table.in-form').on('click', '.edit-item--btn',
    function (e) {
        edit_btn = $(this);
        table_row = edit_btn.closest('tr');
        row_inputs = table_row.children('td').children('input');
        row_selects = table_row.children('td').children('select');

        modal_id = table_row.parents('table').parent('div').attr('id') + '__modal';

        row_fields = [];
        row_inputs.each(function(){
            field = { 'name': $(this).data('name'), 'value': $(this).val()};
            row_fields.push(field);
        });
        row_selects.each(function(){
            field = { 'name': $(this).data('name'), 'value': $(this).val()};
            row_fields.push(field);
        });

        $.ajax({
            url: tableRow.editUrl,
            type: 'get',
            data: {
                'modelClass': $(this).data('model-class'),
                'editView': $(this).data('form-view'),
                'rowData': row_fields,
                'rowId': table_row.attr('id'),
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
    function(e) {
        $(this).flatpickr({
            // hourIncrement : 1,
            minuteIncrement: 15,
            enableTime: true
        });
    });

$('table.in-form tbody').on('change', 'select.list-option',
    function(e) {
        e.stopPropagation(); // !! DO NOT use return false it stops execution

        if ($(this).val() == '')
            return false;

        table_row = $(this).closest('tr');

        $.ajax({
            url: tableRow.getUrl,
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
    function(e) {
        e.stopPropagation(); // !! DO NOT use return false it stops execution

        if ($(this).val() == '')
            return false;

        table_row = $(this).closest('tr');
    });

$('table.in-form').on('click',  'th.select-all-rows > .ui.checkbox',
    function(e) {
        select_all_rows = $(this).find('input').is(':checked');
        all_rows = $(this).parents('table').find('td.select-row input');
        del_row = $(this).parents('table').siblings('.del-row');

        if (select_all_rows) {
            del_row.show();
            all_rows.each(
                function (e) {
                    $(this).prop('checked', true);
                }
            );
        }
        else {
            del_row.hide();
            all_rows.each(
                function (e) {
                    $(this).prop('checked', false);
                }
            );
        }
    });

$('.add-row').on('click',
    function(e) {
        e.stopPropagation(); // !! DO NOT use return false it stops execution
        el_table = $(this).siblings('table.in-form');
        el_table_body = el_table.find('tbody');

        $.ajax({
            url: tableRow.addUrl,
            type: 'get',
            data: {
                'modelClass': $(this).data('model-class'),
                'formView': $(this).data('form-view'),
                'nextRowId': el_table_body.find('tr').not('#no_data').length + 1
            },
            success: function(response) {
                el_table_body.find('tr#no_data').hide();
                el_table_body.append(response);

                displaySelectAllCheckboxIf(el_table);
            },
            error: function(jqXhr, textStatus, errorThrown) {
                console.log(errorThrown);
            }
        });
    });

$('table.in-form tbody').on('click', 'td.select-row > .ui.checkbox',
    function(e) {
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
    function(e) {
        $(this).css('display', 'none');
        el_table = $(this).siblings('table.in-form');
        selected_rows = el_table.find('td.select-row > .ui.checkbox > input:checked');

        selected_rows.each(
            function(e) {
                table_row = $(this).parents('tr');
                table_row.remove();
            });
        displaySelectAllCheckboxIf(el_table);
    });

function displaySelectAllCheckboxIf(el_table)
{
    cb_select_all_rows = el_table.find('thead th.select-all-rows .ui.checkbox');
    cb_select_all_rows.find('input').prop('checked', false);

    rowCount = el_table.find('tbody > tr').not('#no_data').length;
    if (rowCount == 0) {
        el_table.find('tbody > tr#no_data').show();
        cb_select_all_rows.hide();
    }
    else {
        cb_select_all_rows.show();
    }
}