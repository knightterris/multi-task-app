$(document).on('click', '.send', function() {
    var msg = $('#comment').val();
    var productId = $('#product_id').val();
    $.ajax({
        type: "POST",
        // url: "{{ route('admin.product.addComment') }}",
        url: "/admin/product/product/add/comment",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            message: msg,
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
$(document).on('input', '.comment', function() {
    var commentLength = $('#comment').val().length; //max 75
    var currentValue = $('#comment').val();
    if (commentLength > 75) {
        $('#comment').replaceWith(
            "<textarea class='form-control commetTextarea' type='text' id='comment' name='comment' rows='5'>" +
            currentValue + "</textarea>");
        $('.commetTextarea').css('height', '100px');
    }
})
