$(document).ready( function () {
    $('body').on('click', '#tb-LD tbody tr', function () {
        $('.form-censor-document').css('display', 'block');
        var document_id = $(this).attr('id');
        $('tr').removeClass('active');
        $(this).addClass('active');
        $.get('/get/document/' + document_id, function (data, status) {
            console.log(data);
            $('.document-id').val(data.id);
            $('.document-name').val(data.name);
            $('.document-description').val(data.description);
            $('.document-thumbnail').attr('src', '/storage/thumbnails/' + data.thumbnail);
            $('.document-pdf').attr('data', '/storage/documents/' + data.file_name);
            $('.document-category').val(data.category.name);
            $('.document-category').attr('id', data.category.id);
            $('#parent_category').val(data.category.parent_id);
            $.get('/get/sub-categories/' + data.category.parent_id, function(data, status){
                console.log(data);
                $('#category_id option').remove();
                $('#category_id').append($('<option></option>')
                        .attr('value', null)
                        .text('-----'));
                data.forEach(el => {
                    $('#category_id').append($('<option></option>')
                        .attr('value', el.id)
                        .text(el.name));
                });
            });
        });
    });
    $('#parent_category').change(() => {
        let parentCategoryId = $('#parent_category').val();
        $.get('/get/all-categories', function(data, status){
            data.forEach(element => {
                if(element.id == parentCategoryId){
                    let sub_categories = element.sub_categories;
                    $('#category_id option').remove();
                    sub_categories.forEach(el => {
                        $('#category_id').append($('<option></option>')
                        .attr('value', el.id)
                        .text(el.name));
                    });
                }
            });
        });
    });
});
