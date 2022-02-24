$(itemDoc.table).on('click', '.edit-row',
    function (e) {
        el_edit_btn = $(this);

        $.ajax({
            url: 'edit-row',
            type: 'get',
            data: {
                'modelClass': $(this).data('modelclass'),
                'modelId': $(this).data('modelid'),
                'formView': $(this).data('formview'),
            },
            success: function( response )
            {
                $('.modal .content').html( response ); // Target '.content' to keep close button in modal
                $('.modal').modal({ 
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

$(itemDoc.table + ' tbody').on('click', 'input.pikadaytime',
    function(e) {
        $(this).flatpickr({
            // hourIncrement : 1,
            minuteIncrement: 15,
            enableTime: true
        });
    });

$(itemDoc.section + ' .add-row').on('click',
    function(e) {
        e.stopPropagation(); // !! DO NOT use return false it stops execution
        el_table_body = $(itemDoc.table + ' tbody');
        has_no_data = el_table_body.find('tr#no_data').length == 1;
        if (has_no_data)
            el_table_body.find('tr#no_data').remove();

        $.ajax({
            url: itemDoc.addRowUrl,
            type: 'get',
            data: {
                'modelClass': $(this).data('modelclass'),
                'listModelClass': null, // Row
                'formView': $(this).data('formview'),
                'nextRowId': el_table_body.find('tr').length + 1
            },
            success: function(response) {
                el_table_body.append(response);

                $('#submit_btn').hide();
                $('#save_btn').show();

                displaySelectAllCheckboxIf()
            },
            error: function(jqXhr, textStatus, errorThrown) {
                console.log(errorThrown);
            }
        });
    });

// item table only
$(itemDoc.table + ' tbody').on('change', 'select.items.item-option',
    function(e) {
        e.stopPropagation(); // !! DO NOT use return false it stops execution

        if ($(this).val() == '')
            return false;

        el_table_row = $(this).closest('tr');
        el_input_item_qty = el_table_row.find('td.item-qty > input');
        el_input_item_rate = el_table_row.find('td.item-rate > input');
        el_input_item_tax = el_table_row.find('td.item-tax > input');
        el_input_item_total = el_table_row.find('td.item-total > input');

        $.ajax({
            url: itemDoc.getRowUrl,
            type: 'get',
            data: {
                'item_id': $(this).val()
            },
            success: function(list) {
                // Re-calculate the Line list totals
                el_input_item_qty.val(list.min_order_qty); // default is 1
                el_input_item_rate.val(list.standard_rate);
                el_input_item_tax.val(list.tax_rate);
                el_input_item_total.val(list.standard_rate * list.min_order_qty);

                // Re-calculate the Document totals
                recalculateDocumentTotals();
            },
            error: function(jqXhr, textStatus, errorThrown) {
                console.log(errorThrown);
            }
        });
    });

// item table only
$(itemDoc.table + ' tbody').on('change',
        'td.item-qty > input, td.item-rate > input, td.item-discount > input, td.item-tax > input',
    function(e) {
        e.stopPropagation(); // !! DO NOT use return false it stops execution

        if ($(this).val() == '')
            return false;

        el_table_row = $(this).closest('tr');
        el_input_item_qty = el_table_row.find('td.item-qty > input');
        el_input_item_rate = el_table_row.find('td.item-rate > input');
        el_input_item_tax = el_table_row.find('td.item-tax > input');
        el_input_item_total = el_table_row.find('td.item-total > input');
        el_input_item_total.val(el_input_item_rate.val() * el_input_item_qty.val());

        // Re-calculate the Document totals
        recalculateDocumentTotals();
    });

$(itemDoc.table).on('click',  'th.select-all-rows > .ui.checkbox',
    function(e) {
        select_all_rows = $(this).find('input').is(':checked');
        all_rows = $(itemDoc.table + ' tbody').find('td.select-row input');
        del_row = $(itemDoc.section + ' .del-row');

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

$(itemDoc.table + ' tbody').on('click', 'td.select-row > .ui.checkbox',
    function(e) {
        select_all_rows = $(itemDoc.table + ' thead').find('.select-all-rows > .ui.checkbox > input');
        all_rows = $(itemDoc.table + ' tbody').find('input:checkbox').length;
        selected_rows = $(itemDoc.table + ' tbody').find('input:checked').length;
        del_row = $(itemDoc.section + ' .del-row');

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

$(itemDoc.section + ' .del-row').on('click',
    function(e) {
        $(this).css('display', 'none');
        modelClass = $(this).data('modelclass');

        $(itemDoc.table + ' td.select-row > .ui.checkbox > input:checkbox').each(
            function(e) {
                el_table_row = $(this).closest('tr');
                el_id = el_table_row.find('td.item > input');

                if (el_id.val() == '')
                {
                    el_table_row.remove();
                } else {
                    $.ajax({
                        url: itemDoc.deleteRowUrl,
                        type: 'post',
                        data: {
                            _csrf: yii.getCsrfToken(),
                            'modelId': el_id.val(),
                            'modelType': 'Row'
                        },
                        success: function(response) {
                            el_table_row.remove();
                        },
                        error: function(jqXhr, textStatus, errorThrown) {
                            console.log(errorThrown);
                        }
                    });
                }
            });
        // Re-calculate the Document totals
        recalculateDocumentTotals();
        displaySelectAllCheckboxIf()
    });

function displaySelectAllCheckboxIf()
{
    el_checkbox_all = $(itemDoc.table + ' th.select-all-rows > .ui.checkbox > input:checkbox');
    el_checkbox_all.prop('checked', false);

    rowCount = $(itemDoc.table + ' tbody > tr').length;
    if (rowCount > 0)
        el_checkbox_all.parent('.ui.checkbox').css('display', '');
    else
        el_checkbox_all.parent('.ui.checkbox').css('display', 'none');
}

// Re-calculate the Document table and totals
function recalculateDocumentTotals()
{
    sum_item_total = sum_tax_amount = 0;

    $(itemDoc.table + ' td.item-total > input').each(
        function() {
            list_total = $(this).val();
            if (list_total == null)
                return false;

            sum_item_total += parseFloat(list_total);
            tax_rate = $(this).closest('tr').find('td.item-tax > input.tax-rate').val();

            tax_amount = list_total * tax_rate / (1 + tax_rate);
            sum_tax_amount += parseFloat(tax_amount);
        });

    $('#' + itemDoc.formId + '-net_total').val(sum_item_total.toFixed(2));
    $('#' + itemDoc.formId + '-tax_amount').val(sum_tax_amount.toFixed(2));
    $('#' + itemDoc.formId + '-total_amount').val(sum_item_total.toFixed(2));

    // Re-calculate the Document payments
    sum_paid_amount = 0;

    $(paymentDoc.table + ' td.paid-amount > input').each(
        function(e) {
            paid_amount = $(this).val();
            if (paid_amount.length != 0) {
                sum_paid_amount += parseFloat(paid_amount);
            }
        });

    if (sum_paid_amount == '')
        sum_paid_amount = 0;

    $('#' + itemDoc.formId + '-balance_amount').val(sum_item_total - sum_paid_amount);
    $('#' + itemDoc.formId + '-paid_amount').val(sum_paid_amount.toFixed(2));
    $('#' + itemDoc.formId + '-change_amount').val(sum_paid_amount - sum_item_total);
}