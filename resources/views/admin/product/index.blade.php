@extends('admin.layouts.index')
@section('title', 'Product Page')

@section('styles')
    <style>
        .ti-trash {
            cursor: pointer;
        }

        .container {
            padding: 2rem 0rem;
        }

        h4 {
            margin: 2rem 0rem 1rem;
        }

        .table-image {

            td,
            th {
                vertical-align: middle;
            }
        }

        .table>tbody>tr>td,
        .table>tbody>tr>th,
        .table>tfoot>tr>td,
        .table>tfoot>tr>th,
        .table>thead>tr>td,
        .table>thead>tr>th {
            line-height: 32px;
            vertical-align: middle;
        }

        .swal2-icon.swal2-warning.swal2-icon-show {
            width: 200px;
            height: 200px;
        }

        #swal2-title {
            margin-top: 50px;
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col">
            <div class="card ">

                <div class="card-header d-flex justify-content-between">
                    {{ trans('globalText.product.title') }}
                    <div class="">
                        <a href="{{ route('admin.product.createFoodPage') }}"><button
                                class="btn btn-primary mr-3">{{ trans('globalText.product.add_Food') }}</button></a>
                        <a href="{{ route('admin.product.createItemPage') }}"><button
                                class="btn btn-primary">{{ trans('globalText.product.add_item') }}</button></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            @if (count($data) != 0)
                                <table class="table table-image">
                                    <thead>
                                        <tr>
                                            <th scope="col">{{ trans('globalText.product.id') }}</th>
                                            <th scope="col">{{ trans('globalText.product.image') }}</th>
                                            <th scope="col">{{ trans('globalText.product.description') }}</th>
                                            <th scope="col">{{ trans('globalText.product.name') }}</th>
                                            <th scope="col">{{ trans('globalText.product.category') }}</th>
                                            <th scope="col">{{ trans('globalText.product.status') }}</th>
                                            <th scope="col">{{ trans('globalText.product.price') }}</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            <tr>
                                                <th scope="row" class="text-dark">{{ $item->id }}</th>
                                                <td class="w-25">
                                                    @if ($item->image)
                                                        <img src="{{ asset('storage/product_images/' . $item->image) }}"
                                                            class="img-fluid"
                                                            style="width:500px; height:300px; object-fit: contain;">
                                                    @else
                                                        <img src="{{ asset('home/admin/no-image.png') }}" class="img-fluid"
                                                            style="width:500px; height:300px; object-fit: contain;">
                                                    @endif
                                                </td>
                                                <td class="w-25 text-dark">{{ Str::limit($item->description, 200) }}</td>
                                                <td class="text-dark">{{ $item->name }}</td>
                                                <td class="text-dark">{{ $item->category_id }}</td>
                                                <td class="text-dark">{{ $item->status }}</td>
                                                <td class="text-dark">{{ $item->price }}</td>
                                                <td>

                                                    <a href="{{ route('admin.product.show', $item->id) }}"><i
                                                            class="ti-eye mr-3 text-dark"></i></a>
                                                    <a href="{{ route('admin.product.edit', $item->id) }}"><i
                                                            class="ti-pencil mr-3 text-dark"></i></a>
                                                    <i class="ti-trash text-dark deleteProduct"
                                                        data-productId="{{ $item->id }}"></i>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            @else
                                <div class="alert alert-warning" role="alert">
                                    {{ trans('globalText.product.no_product') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/sweetalert2@7.8.2/dist/sweetalert2.all.js"></script>
    <script>
        $(document).on('click', '.deleteProduct', function() {
            var productId = $(this).attr('data-productId');
            Swal.fire({
                icon: 'warning',
                title: 'Are you sure to delete this product?',
            })
            $('.swal2-confirm').on('click', function() {
                $.ajax({
                    type: "GET",
                    url: "{{ route('admin.product.delete') }}",
                    data: {
                        product_id: productId
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
    </script>
@endsection
