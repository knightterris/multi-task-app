@extends('admin.layouts.index')
@section('title', 'Product Page')
@section('styles')
    <style>
        .ti-arrow-left {
            cursor: pointer;
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col">
            <div class="card ">
                <div class="card-header text-center">
                    <div class="row my-3">
                        <div class="col-1">
                            <i class="ti-arrow-left text-dark" onclick="history.back()"></i>
                        </div>
                        <div class="col">
                            {{ trans('globalText.product.show_page') }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="card">
                        <div class="card-header">{{ trans('globalText.product.product_cover_image') }}</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-12 col-12 offset-2">
                                    <div class="card">
                                        <div class="card-body">
                                            @if ($data->image)
                                                <a href="{{ asset('storage/product_images/' . $data->image) }}">
                                                    <img src="{{ asset('storage/product_images/' . $data->image) }}"
                                                        class="img-fluid img-thumbnail"
                                                        style="width:100%; height:300px; object-fit:cover;">
                                                </a>
                                            @else
                                                <img src="{{ asset('home/admin/no-image.png') }}"
                                                    class="img-fluid img-thumbnail"
                                                    style="width:500px; height:300px; object-fit:cover;">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header text-center">{{ trans('globalText.product.product_datails') }}</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    {{ trans('globalText.product.name') }}
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    {{ $data->name }}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    {{ trans('globalText.product.type') }}
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    @if ($data->product_type == 0)
                                        <span class="badge badge-success">Food</span>
                                    @endif
                                    @if ($data->product_type == 1)
                                        <span class="badge badge-success">Item</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    {{ trans('globalText.product.category') }}
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    @if ($data->product_type == 0)
                                        {{ $foodCategory['name'] }}
                                    @endif
                                    @if ($data->product_type == 1)
                                        {{ $itemCategory['name'] }}
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    {{ trans('globalText.product.owner') }}
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    {{ $data->created_by }}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    {{ trans('globalText.product.status') }}
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    @if ($data->status == 0)
                                        <span class="badge badge-success">In-stock</span>
                                    @endif
                                    @if ($data->status == 1)
                                        <span class="badge badge-danger">Out-of-stock</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    {{ trans('globalText.product.price') }}
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    {{ $data->price }}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    {{ trans('globalText.product.count') }}
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    {{ $data->count }}
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="col-lg-12 col-md-6 col-12 font-weight-bold">
                                {{ trans('globalText.product.contact') }}</div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12"> <span>{{ trans('globalText.product.creator_name') }}
                                        : </span> {{ $data->creator_name }}
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <span>{{ trans('globalText.product.creator_email') }} : </span>
                                    {{ $data->creator_email }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <span>{{ trans('globalText.product.creator_phone') }} : </span>
                                    {{ $data->creator_phone }}
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="col-lg-12 col-md-6 col-12">{{ trans('globalText.product.description') }}</div>
                            <div class="col-lg-12 col-md-6 col-12">{{ $data->description }}</div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-12">
                    <div class="card">
                        <div class="card-header">{{ trans('globalText.product.product_images') }}</div>
                        <div class="card-body">
                            <div class="row">
                                @if (count($images) != 0)
                                    @foreach ($images as $item)
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <a href="{{ asset('storage/product_images/' . $item->image) }}">
                                                        <img src="{{ asset('storage/product_images/' . $item->image) }}"
                                                            class="img-fluid img-thumbnail"
                                                            style="width:100%; height:300px; object-fit:cover;">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="alert alert-warning" role="alert">
                                        {{ trans('globalText.product.no_images') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>




        </div>
    </div>
@endsection
