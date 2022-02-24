$('#img_link').on('click', function(e) {
    $('#uploadform-file_upload')[0].click();
    return false;
});

$('#del_file').on('click', function(e) {
    // Assuming the img preview tag is inside an anchor tag
    $('#img_link img').attr('src', $(this).data('file-path'));
    $('#file_path').val('');
});

$('#uploadform-file_upload').on('change', function() {
    var file = document.getElementById('uploadform-file_upload').files[0];
    $('#file_path').val(file.name);

    var preview = document.querySelector('#img_link img');

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