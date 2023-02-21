@extends('admin.layouts.index')
@section('title', 'Dashboard')
@section('styles')
    <style>
        .ti-heart {
            cursor: pointer;
        }

        .colored-toast.swal2-icon-success {
            background-color: #a5dc86 !important;
        }

        .swal2-popup.swal2-toast .swal2-title {
            margin-top: 10px !important;
        }
    </style>
@endsection
@section('content')
    @if (session('remove_success'))
        <div class="alert alert-warning alert-dismissible fade show my-3" role="alert">
            <strong>{{ session('remove_success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="row">
        @foreach ($data as $item)
            <div class="col-4">
                <div class="card p-3" style="height:800px;">
                    <div class="card-header text-center">{{ $item->name }}</div>
                    {{-- <div class="card-body"> --}}
                    <div class="my-3">
                        @if ($item->image)
                            <a href="{{ asset('storage/product_images/' . $item->image) }} "><img
                                    src="{{ asset('storage/product_images/' . $item->image) }}"
                                    class="img-fluid img-thumbnail" style="width:500px; height:300px;"></a>
                        @else
                            <img src="{{ asset('home/admin/no-image.png') }}" class="img-fluid img-thumbnail"
                                style="width:500px; height:300px;">
                        @endif
                    </div>
                    {{-- </div> --}}
                    <div class="card-footer">
                        <div class="my-3 d-flex justify-content-between">
                            <h6>Created By</h6>
                            <span>{{ $item->created_by }}</span>
                        </div>
                        <div class="my-3 d-flex justify-content-between">
                            <h6>Product Name</h6>
                            <span>{{ $item->name }}</span>
                        </div>
                        <div class="my-3 d-flex justify-content-between">
                            <h6>Product Type</h6>
                            @if ($item->product_type == 0)
                                <span class="badge badge-success">Food</span>
                            @endif
                            @if ($item->product_type == 1)
                                <span class="badge badge-success">Item</span>
                            @endif
                        </div>
                        <div class="my-3 d-flex justify-content-between">
                            <h6>Product Status</h6>
                            @if ($item->status == 0)
                                <span class="badge badge-success">In-stock</span>
                            @endif
                            @if ($item->status == 1)
                                <span class="badge badge-danger">Out-of-stock</span>
                            @endif

                        </div>
                        <div class="my-3 ">
                            <h6>Description</h6>
                            <span>{{ Str::limit($item->description, 200) }}</span>
                        </div>
                    </div>
                    <div class="card-footer mb-3">
                        <div class="d-flex justify-content-between">
                            <div class="mt-2">
                                <i class="ti-heart me-2 like-icon" data-id="{{ $item->id }}"></i>
                                <span class="">{{ $item->like }} Likes</span>
                                <a href="{{ route('admin.product.show', $item->id) }}"><i class="ti-eye ml-3 text-dark"
                                        title="See Details"></i></a>
                            </div>
                            <div class="">
                                @if ($item->wishlist_status == 0)
                                    <button class="btn btn-primary wishlist" data-id="{{ $item->id }}">
                                        <i class="ti-download"></i>
                                        {{ trans('globalText.product.wishlist') }}
                                    </button>
                                @else
                                    <a href="{{ route('admin.product.removeWishList', $item->id) }}">
                                        <button class="btn btn-danger">
                                            <i class="ti-trash"></i>
                                            {{ trans('globalText.product.remove_wishlist') }}
                                        </button>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
        integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/sweetalert2@7.8.2/dist/sweetalert2.all.js"></script>
    <script>
        $(document).on('click', '.wishlist', function() {
            var productId = $(this).attr('data-id');
            $.ajax({
                type: "POST",
                url: "{{ route('admin.product.addWishList') }}",
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
            var eachId = $(this).attr('data-id');

            $.ajax({
                type: "POST",
                url: "{{ route('admin.product.addLike') }}",
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
                        title: data
                    }).then((result) => {
                        if (result.dismiss === Swal.DismissReason.timer) {
                            location.reload();
                        }
                    });
                }
            });
        })

        //firstly we need to add like_by_id in the product model. // remove like_by_id column from product table , create a new table containing user id and product id and like count.
        //get each post id and update it in the controller.
        //if auth::user()->id == product->like_by_id => likes minus 1
    </script>
@endsection
