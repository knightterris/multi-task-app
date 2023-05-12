let formData = new FormData();
url = '';
if (window.location.href.indexOf("create") > -1) {
url = '/admin/product/product/create/food';
} else {
url = '/admin/product/product/update'
}
var productData = () =>{
    let files = $('#product_images')[0].files;
    for (let i = 0; i < files.length; i++) {
        formData.append('product_images[]', files[i]);
    }
    formData.append('product_name', $('#product_name').val());
    formData.append('product_description', $('#product_description').val());
    formData.append('product_price', $('#product_price').val());
    formData.append('product_image', $('#product_image')[0].files[0]);
    formData.append('product_category', $('#product_category').val());
    formData.append('product_count', $('#product_count').val());
    formData.append('product_status', $('#product_status').val());
    formData.append('product_type', $('#product_type').val());
    if(window.location.href.indexOf("edit") > -1){
        formData.append('product_id', $("#product_id").val());
    }
}

var ajaxCallfunction = () =>{
    $.ajax({
        type: "POST",
        url: url,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: formData,
        processData: false,
        contentType: false,
        success: function(data) {
            Swal.fire({
                icon: 'success',
                title: data,
            })
            $('.swal2-confirm').on('click', function() {
                window.location.href = "/admin/product/product/page"
            })
        },
        error: function(xhr) {
            if (xhr.status == 422) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please type something and add some images to create!',
                })
            }
        }
    });
}

//create product
$(document).ready(function(){
    $(document).on('click','.create',function(){
        productData();
        ajaxCallfunction();
    });
});

//update product
$(document).ready(function() {
    $(document).on('click', '.update', function() {
        productData();
        ajaxCallfunction();
    });
});

//sweetalert warning and success

var sweetalertWarning = () =>{
    Swal.fire({
        icon: 'warning',
        title: 'Are you sure to delete cover image?',
    })
}


//delete cover image
var currentUrl = window.location.href;
var productID = currentUrl.split('/').pop();

$(document).on('click', '#delete_cover', function() {
    var coverImageId = $('#cover_image_id').val();
    sweetalertWarning();
    $('.swal2-confirm').on('click', function() {
        $.ajax({
            type: "GET",
            url: "/admin/product/product/delete/cover_image" + '/' + productID,
            data: coverImageId,
            success: function(data) {
                Swal.fire({
                    icon: 'success',
                    title: data,
                })
                $('.swal2-confirm').on('click', function() {
                    location.reload();
                })
            },

        });
    })
})

//delete each image
$(document).on('click', '.each_image_id', function() {
    var eachImageId = $(this).attr('data-imageId');
    sweetalertWarning();
    $('.swal2-confirm').on('click', function() {
        $.ajax({
            type: "GET",
            url:'/admin/product/product/delete/each_image' + '/' + productID,
            data: {
                image_id: eachImageId
            },
            success: function(data) {
                Swal.fire({
                    icon: 'success',
                    title: data,
                })
                $('.swal2-confirm').on('click', function() {
                    location.reload();
                })
            },

        });
    })
})




