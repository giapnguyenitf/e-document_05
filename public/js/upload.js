$(document).ready(() => {
    $('#add_category').click(() => {
        $('#category_id').remove();
        $('.sub_category').html(
            `
            <input class="form-control input-sm" name="new_category" id="new_category" value="" placeholder="">
        `
        );
    });

    $('#parent_category').change(() => {
        let parentCategoryId = $('#parent_category').val();
        $.get('/get/categories', function(data, status){
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

   $('#select_category').click(() => {
        let parentCategoryId = $('#parent_category').val();
        $('#new_category').remove();
        $('.sub_category').html(
            `
            <select class="btn btn-mini" name="category_id" id="category_id">
            </select>
        `
        );
        $.get('/get/categories', (data, status) => {
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
