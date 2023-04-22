//food category
$(document).on('click', '.create', function() {
    var foodCategoryName = $("#foodCategoryName").val();
    var foodCategoryDescription = $("#foodCategoryDescription").val();
    if (foodCategoryName == '' || foodCategoryDescription == '') {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Please type something to create!',
        })
    }
    $.ajax({
        type: "POST",
        // url: "{{ route('admin.category.createFoodCategory') }}",
        url: "/admin/category/create/food/category",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            food_category_name: foodCategoryName,
            food_category_description: foodCategoryDescription
        },
        success: function(data) {
            Swal.fire({
                icon: 'success',
                title: data,
            })
            $('.swal2-confirm').on('click', function() {
                location.reload();
            })
        }
    });
})

//item category
$(document).on('click', '.createItemCategory', function() {
    var itemCategoryName = $("#itemCategoryName").val();
    var itemCategoryDescription = $("#itemCategoryDescription").val();
    if (itemCategoryName == '' || itemCategoryDescription == '') {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Please type something to create!',
        })
    }
    $.ajax({
        type: "POST",
        // url: "{{ route('admin.item.createItemCategory') }}",
        url: "/admin/category/create/item/category",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            item_category_name: itemCategoryName,
            item_category_description: itemCategoryDescription
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

//edit  category
$(document).on('click', '.update', function() {
    var data = {};
    var currentUrl = window.location.href;
    var categoryId = currentUrl.split('/').pop();

    var url = '';

    var categoryInputValidation = () =>{
        if (updateName == '' || updateDescription == '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Please type something to create!',
            })
            $('.swal2-confirm').on('click', function() {
                location.reload();
            })
        }
    }

    if (window.location.href.indexOf("food") > -1) {
        url = "/admin/category/update/food/category" + '/' + categoryId;
        var updateName = $('#updateCategoryName').val();
        var updateDescription = $('#updateCategoryDescription').val();
        data.food_category_name_update = updateName;
        data.food_category_description_update = updateDescription;
        categoryInputValidation();
    }else{
        url = '/admin/category/update/item/category' + '/' + categoryId;
        var updateName = $('#updateItemName').val();
        var updateDescription = $('#updateItemDescription').val();
        data.item_category_name_update = updateName;
        data.item_category_description_update = updateDescription;
        categoryInputValidation();
    }

    $.ajax({
        type: "POST",
        url: url,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: data ,
        success: function(data) {
            Swal.fire({
                icon: 'success',
                title: data,
            })
            $('.swal2-confirm').on('click', function() {
                window.location.href = "/admin/category/category/page";
            })
        }
    });
})


