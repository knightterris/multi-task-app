@extends('admin.layouts.index')
@section('title', 'Product Create Page')
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
                            @if (url()->current() == route('admin.product.createFoodPage'))
                                {{ trans('globalText.product.title_food') }}
                            @elseif(url()->current() == route('admin.product.createItemPage'))
                                {{ trans('globalText.product.title_item') }}
                            @endif
                        </div>
                    </div>
                </div>

                <div class="card-body">

                    <label for="product_name" class="form-lable my-3">{{ trans('globalText.product.name') }}</label>
                    <input type="text" name="product_name" id="product_name" class="form-control">

                    <label for="product_description"
                        class="form-lable my-3">{{ trans('globalText.product.description') }}</label>
                    <textarea name="product_description" id="product_description" cols="10" rows="1" class="form-control"></textarea>

                    <label for="product_price" class="form-lable my-3">{{ trans('globalText.product.price') }}</label>
                    <input type="number" name="product_price" id="product_price" class="form-control"
                        oninput="this.value = Math.abs(this.value)">

                    <label for="product_image" class="form-lable my-3">{{ trans('globalText.product.image') }}</label>
                    <input type="file" name="product_image" id="product_image" class="form-control">

                    <div class="form-group">
                        <label for="product_image" class="form-lable my-3">{{ trans('globalText.product.image') }}</label>
                        <div class="needsclick dropzone" id="photo-dropzone">
                        </div>
                    </div>

                    <label for="product_images" class="form-lable my-3">{{ trans('globalText.product.images') }}</label>
                    <input type="file" name="product_images[]" id="product_images" class="form-control" multiple>

                    <label for="product_category" class="form-lable my-3">{{ trans('globalText.product.category') }}</label>
                    <select name="product_category" id="product_category" class="form-control">
                        <option value="">{{ trans('globalText.product.choose') }}</option>
                        @foreach ($data as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>

                    <label for="product_count" class="form-lable my-3">{{ trans('globalText.product.count') }}</label>
                    <input type="number" name="product_count" id="product_count" class="form-control" min="0"
                        oninput="this.value = Math.abs(this.value)">

                    <label for="product_status" class="form-lable my-3">{{ trans('globalText.product.status') }}</label>
                    <select name="product_status" id="product_status" class="form-control">
                        <option value="">{{ trans('globalText.product.choose_status') }}</option>
                        <option value="0">{{ trans('globalText.product.in_stock') }}</option>
                        <option value="1">{{ trans('globalText.product.out_of_stock') }}</option>
                    </select>

                    <label for="product_type" class="form-lable my-3">{{ trans('globalText.product.type') }}</label>
                    <select name="product_type" id="product_type" class="form-control">
                        <option value="">{{ trans('globalText.product.choose') }}</option>
                        @if (url()->current() == route('admin.product.createFoodPage'))
                            <option value="0">Food</option>
                        @elseif(url()->current() == route('admin.product.createItemPage'))
                            <option value="1">Item</option>
                        @endif
                    </select>

                    <div class="card-footer mt-3">
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-md btn-primary create" type="submit">Create</button>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('home/customJs/product.js') }}"></script>
    <script>
        Dropzone.options.photoDropzone = {
            url: '{{ route('admin.products.storeMedia') }}',
            maxFilesize: 2, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 2,
                width: 4096,
                height: 4096
            },
            success: function(file, response) {
                $('form').find('input[name="photo"]').remove()
                $('form').append('<input type="hidden" name="photo" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="photo"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {

            },
            error: function(file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }

                return _results
            }
        }
    </script>
@endsection
