$('select[name="categoryList"]').on('change', function(){
    $.ajax({
        url: '/',
        type: 'GET',
        data: {categoryId: $('select[name="categoryList"]').val()},
        success: function(data) {
            $('.body-content .posts').html(data);
        },
        error: function(err) {
            console.log(err);
        }
    });
});