$(document).on('click', '.wishlist', function() {
    var productId = $(this).attr('data-id');
    $.ajax({
        type: "POST",
        // url: "{{ route('admin.product.addWishList') }}",
        url: "/admin/product/product/create/wishList",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            product_id: productId,
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
$(document).on('click', '.ti-heart', function() {
    var eachId = $(this).data('id');
    var likeCountVal = $(this).siblings('.likeCountVal').val();
    var likeCountShow = $(this).siblings('.likeCountShow');
    $.ajax({
        type: "POST",
        // url: "{{ route('admin.product.addLike') }}",
        url: "/admin/product/product/add/like",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            each_id: eachId,
        },
        success: function(data) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-right',
                iconColor: 'white',
                customClass: {
                    popup: 'colored-toast'
                },
                showConfirmButton: false,
                timer: 1000,
            })
            Toast.fire({
                icon: 'success',
                title: 'Liked',
            }).then((result) => {
                if (data.like_status == "liked") {
                    finalLikeCount = data.like;
                    likeCountShow.html(finalLikeCount);
                    $(this).replaceWith(
                        `<i class="fa-solid fa-heart me-2 unlike-icon" data-id="${data.id[0]}"></i>`
                    )
                }
            });
        }.bind(this)
    });
})
$(document).on('click', '.fa-heart', function() {
    var eachId = $(this).data('id');
    var likeCountVal = $(this).siblings('.likeCountVal').val();
    var likeCountShow = $(this).siblings('.likeCountShow');
    $.ajax({
        type: "POST",
        // url: "{{ route('admin.product.dislike') }}",
        url:"/admin/product/product/add/dislike",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            each_id: eachId,
        },
        success: function(data) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-right',
                iconColor: 'white',
                customClass: {
                    popup: 'colored-toast'
                },
                showConfirmButton: false,
                timer: 1000,
            })
            Toast.fire({
                icon: 'success',
                title: 'Unliked',
            }).then((result) => {
                if (data.like_status == "unliked") {
                    finalLikeCount = data.like;
                    likeCountShow.html(finalLikeCount);
                    $(this).replaceWith(
                        `<i class="ti-heart me-2 like-icon" id="like-icon" data-id="${data.id[0]}"></i>`
                    )
                }
            });
        }.bind(this)
    });
})
