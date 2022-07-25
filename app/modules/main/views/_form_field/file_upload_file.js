$('.upload-btn').on('click', function(e) {
    $('#uploadform-file_upload')[0].click();
    return false;
});

$('#uploadform-file_upload').on('change', function() {
    $('.upload-btn').hide();
    $('.del-btn').show();

    var file = document.getElementById('uploadform-file_upload').files[0];
    $('.file-input').val(file.name);
});

$('.del-btn').on('click', function(e) {
    $(this).hide(); // hide del btn
    $('.file-input').val(''); // clear the uploaded file path
    $('.upload-btn').show();
});