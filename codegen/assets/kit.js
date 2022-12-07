$('.check-all').click(function(e)
{
    checked = $(this).find('#check-all').prop('checked');
    $('#files-body').find('td.check > div.ui.checkbox > input').prop('checked', checked);
});

$('.select-overwrite').click(function(e)
{
    checked = $(this).find(':checkbox').prop('checked');
    $('#files-body').find('td.overwrite > div.ui.checkbox > input').prop('checked', checked);
});

$('.select-unchanged').click(function(e)
{
    checked = $(this).find(':checkbox').prop('checked');
    $('#files-body').find('td.check.skip > div.ui.checkbox > input').prop('checked', checked);
});

$('.select-create').click(function(e)
{
    checked = $(this).find(':checkbox').prop('checked');
    $('#files-body').find('td.check.create > div.ui.checkbox > input').prop('checked', checked);
});
