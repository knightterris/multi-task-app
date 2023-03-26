@extends('admin.layouts.index')
@section('title', 'Dashboard')
@section('styles')
    <style>
        .ti-heart {
            cursor: pointer;
        }
        .fa-heart{
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
                <div class="card p-3" style="height:850px;">
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
                            <h6>Created At</h6>
                            <span>{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</span>
                        </div>
                        <div class="my-3 d-flex justify-content-between">
                            <h6>Updated At</h6>
                            <span>{{ \Carbon\Carbon::parse($item->updated_at)->diffForHumans() }}</span>
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
                            <h6>Description {{ $item->id }}</h6>
                            <span>{{ Str::limit($item->description, 100) }}</span>
                        </div>
                    </div>
                    <div class="card-footer mb-3">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-12">
                                @if ($item->like_status == 'liked')
                                    <i class="fa-solid fa-heart me-2 unlike-icon" id="unlike-icon" data-id="{{ $item->id }}"></i>
                                @else
                                    <i class="ti-heart me-2 like-icon" id="like-icon" data-id="{{ $item->id }}"></i>
                                @endif
                                <input type="hidden" class="likeCountVal" id="likeCountVal" value="{{ $item->like }}">
                                <span class="me-5 likeCountShow" id="likeCountShow">{{ $item->like }}</span>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-3 col-12">
                                <a href="{{ route('admin.product.commentList', $item->id) }}"><i
                                        class="fa-regular fa-comments text-dark me-3"></i>{{ $item->comment }}</a>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-3 col-12">
                                <a href="{{ route('admin.product.show', $item->id) }}"><i class="ti-eye ml-3 text-dark"
                                        title="See Details"></i></a>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-3 col-12">
                                @if ($item->wishlist_status == 0)
                                    <button class="btn btn-primary wishlist" data-id="{{ $item->id }}"
                                        title="Add to Wishlist">
                                        <i class="fa-regular fa-bookmark"></i>
                                    </button>
                                @else
                                    <a href="{{ route('admin.product.removeWishList', $item->id) }}">
                                        <button class="btn btn-danger" title="Remove From Wishlist">
                                            <i class="ti-trash"></i>
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
            var eachId = $(this).data('id');
            var likeCountVal = $(this).siblings('.likeCountVal').val();
            var likeCountShow = $(this).siblings('.likeCountShow');
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
                        title: 'Liked',
                    }).then((result) => {
                        if (data.like_status == "liked") {
                            finalLikeCount = parseInt(likeCountVal) + 1;
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
                url: "{{ route('admin.product.dislike') }}",
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
                            finalLikeCount = parseInt(likeCountVal) - 1;
                            likeCountShow.html(finalLikeCount);
                            $(this).replaceWith(
                                `<i class="ti-heart me-2 like-icon" id="like-icon" data-id="${data.id[0]}"></i>`
                            )
                        }
                    });
                }.bind(this)
            });
        })
    </script>
@endsection
