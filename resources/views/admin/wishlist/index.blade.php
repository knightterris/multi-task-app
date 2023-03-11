@extends('admin.layouts.index')
@section('title', 'My Wishlist')
@section('content')
    @if (session('remove_success'))
        <div class="alert alert-warning alert-dismissible fade show my-3" role="alert">
            <strong>{{ session('remove_success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="row">
        @if (count($data) != 0)
            @foreach ($data as $item)
                <div class="col-4">
                    <div class="card p-3" style="height:800px;">
                        <div class="card-header text-center">{{ $item->name }}</div>
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
                                    <i class="ti-heart me-2" data-id="{{ $item->id }}"></i>
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
        @else
            <h3 class="text-danger text-center p-3">{{ trans('globalText.product.no_wishlist') }}</h3>
        @endif
    </div>
@endsection
