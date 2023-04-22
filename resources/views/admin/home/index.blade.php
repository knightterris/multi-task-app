@extends('admin.layouts.index')
@section('title', 'Dashboard')
@section('styles')
    <style>
        .ti-heart {
            cursor: pointer;
        }

        .ti-bookmark-alt {
            cursor: pointer;
        }

        .fa-heart {
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
            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                <div class="card p-3" style="height:850px;">
                    <div class="card-header text-center">
                        <div class="d-flex">
                            <div class="col-lg-11 col-md-11 col-sm-11">{{ $item->name }}</div>
                            <div class="col-lg-1 col-md-1 col-sm-1">
                                @if ($item->wishlist_status == 0)
                                    <i class="ti-bookmark-alt wishlist" data-id="{{ $item->id }}"
                                        title="Add Bookmark"></i>
                                @else
                                    <a href="{{ route('admin.product.removeWishList', $item->id) }}">
                                        <i class="fa-solid fa-bookmark" title="Remove Bookmark"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="my-3">
                        @if ($item->image)
                            <a href="{{ asset('storage/product_images/' . $item->image) }} "><img
                                    src="{{ asset('storage/product_images/' . $item->image) }}" class="img-fluid"
                                    style="width:500px; height:300px; object-fit: cover;"></a>
                        @else
                            <img src="{{ asset('home/admin/no-image.png') }}" class="img-fluid"
                                style="width:500px; height:300px; object-fit: cover;">
                        @endif
                    </div>
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
                            <h6>Description </h6>
                            <span>{{ Str::limit($item->description, 100) }}</span>
                        </div>
                    </div>
                    <div class="card-footer mb-3">
                        <div class="d-flex">
                            {{-- @if ($item->like_status == 'liked')
                                <i class="fa-solid fa-heart me-2 unlike-icon" id="unlike-icon"
                                    data-id="{{ $item->id }}"></i>
                            @else
                                <i class="ti-heart me-2 like-icon" id="like-icon" data-id="{{ $item->id }}"></i>
                            @endif --}}
                            @if (\app\Models\Reaction::where('product_id', $item->id)->where('user_id', Auth::user()->id)->exists())
                                <i class="fa-solid fa-heart me-2 unlike-icon" id="unlike-icon"
                                    data-id="{{ $item->id }}"></i>
                            @else
                                <i class="ti-heart me-2 like-icon" id="like-icon" data-id="{{ $item->id }}"></i>
                            @endif
                            <input type="hidden" class="likeCountVal" id="likeCountVal" value="{{ $item->like }}">
                            <span class="me-5 likeCountShow" id="likeCountShow">{{ $item->like }}</span>

                            <a href="{{ route('admin.product.commentList', $item->id) }}"><i
                                    class="fa-regular fa-comments text-dark me-3"></i>{{ $item->comment }}</a>

                            <a href="{{ route('admin.product.show', $item->id) }}"><i class="ti-eye ml-3 text-dark"
                                    title="See Details"></i></a>


                        </div>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('scripts')

    <script src="{{ asset('home/customJs/reaction.js') }}"></script>
@endsection
