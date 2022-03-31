$('.upload-btn').on('click', function(e) {
    $('#uploadform-file_upload')[0].click();
    return false;
});

$('#uploadform-file_upload').on('change', function() {
    $('.upload-btn').hide();
    $('.upload-preview').show();
    $('.del-btn').show();

    var file = document.getElementById('uploadform-file_upload').files[0];
    $('.file-path').val(file.name);

    var preview = document.querySelector('.upload-preview img');

    var reader  = new FileReader();
    reader.onloadend = function () {
        preview.src = reader.result;
    }

    if (file) {
        reader.readAsDataURL(file);
    } else {
        preview.src = '';
    }
});

$('.del-btn').on('click', function(e) {
    $(this).hide(); // hide del btn
    $('.file-path').val(''); // clear the uploaded file path
    // $('.upload-preview img').attr('src', $(this).data('file-path'));
    $('.upload-preview img').attr('src', '');
    $('.upload-preview').hide();
    $('.upload-btn').show();
});