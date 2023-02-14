@extends('admin.layouts.index')
@section('title','Product Update Page')
@section('styles')
<style>
    .ti-arrow-left{
        cursor: pointer;
    }
    .swal2-icon.swal2-warning.swal2-icon-show{
        width:200px;
        height: 200px;
    }
    #swal2-title{
        margin-top: 50px;
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
                        {{ trans('globalText.product.update_page') }}
                    </div>
                </div>
            </div>

            <div class="card-body">
                    <input type="hidden" name="product_id" id="product_id" value="{{ $data->id }}">
                    <label for="product_name" class="form-lable my-3">{{ trans('globalText.product.name') }}</label>
                    <input type="text" name="product_name" id="product_name" class="form-control" value="{{ $data->name }}">

                    <label for="product_description" class="form-lable my-3">{{ trans('globalText.product.description') }}</label>
                    <textarea name="product_description" id="product_description" cols="10" rows="1" class="form-control">{{ $data->description }}</textarea>

                    <label for="product_price" class="form-lable my-3">{{ trans('globalText.product.price') }}</label>
                    <input type="number" name="product_price" id="product_price" class="form-control" value="{{ $data->price }}" oninput="this.value = Math.abs(this.value)">

                    <label for="product_image" class="form-lable my-3">{{ trans('globalText.product.image') }}</label>
                    <input type="file" name="product_image" id="product_image" class="form-control">

                    <label for="product_images" class="form-lable my-3">{{ trans('globalText.product.images') }}</label>
                    <input type="file" name="product_images[]" id="product_images" class="form-control" multiple>

                    <label for="product_category" class="form-lable my-3">{{ trans('globalText.product.category') }}</label>
                    <select name="product_category" id="product_category" class="form-control">
                        <option value="">{{ trans('globalText.product.choose') }}</option>
                        @if($data->product_type == 0)
                            @foreach ($foodCategory as $item)
                                <option value="{{ $item->id }}" @if($data->category_id == $item->id) selected @endif>{{ $item->name }}</option>
                            @endforeach
                        @endif

                        @if($data->product_type == 1)
                            @foreach ($itemCategory as $item)
                                <option value="{{ $item->id }}" @if($data->category_id == $item->id) selected @endif>{{ $item->name }}</option>
                            @endforeach
                        @endif
                    </select>

                    <label for="product_count" class="form-lable my-3">{{ trans('globalText.product.count') }}</label>
                    <input type="number" name="product_count" id="product_count" class="form-control" value="{{ $data->count }}" min="0" oninput="this.value = Math.abs(this.value)">

                    <label for="product_status" class="form-lable my-3">{{ trans('globalText.product.status') }}</label>
                    <select name="product_status" id="product_status" class="form-control">
                        <option value="">{{ trans('globalText.product.choose_status') }}</option>
                        <option value="0" @if($data->status == 0) selected @endif>{{ trans('globalText.product.in_stock') }}</option>
                        <option value="1" @if($data->status == 1) selected @endif>{{ trans('globalText.product.out_of_stock') }}</option>
                    </select>

                    <label for="product_type" class="form-lable my-3">{{ trans('globalText.product.type') }}</label>
                    <select name="product_type" id="product_type" class="form-control">
                        <option value="">{{ trans('globalText.product.choose') }}</option>
                        <option value="0" @if($data->product_type == 0) selected @endif>Food</option>
                        <option value="1" @if($data->product_type == 1) selected @endif>Item</option>
                    </select>

                    <div class="card-footer mt-3">
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-md btn-primary update" type="submit">{{ trans('globalText.product.update_btn') }}</button>
                        </div>
                    </div>

            </div>
        </div>

        <div class="card">
            <div class="card-header">{{ trans('globalText.product.product_cover_image') }}</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                        <div class="card">
                            <input type="hidden" name="cover_image_id" id="cover_image_id" value="{{ $data->id }}">
                            @if ($data->image)
                                <div class="card-body">
                                    <img src="{{ asset('storage/product_images/'.$data->image) }}" class="img-fluid img-thumbnail" style="width:100%; height:300px;">
                                </div>
                                <div class="card-footer">
                                    <div class="d-flex justify-content-end">
                                        <div class="btn btn-md btn-danger" id="delete_cover" type="">{{ trans('globalText.product.delete_btn') }}</div>
                                    </div>
                                </div>
                            @else
                            <div class="alert alert-warning" role="alert">
                                {{ trans('globalText.product.no_cover_image') }}
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">{{ trans('globalText.product.product_images') }}</div>
            <div class="card-body">
                <div class="row">
                    @if (count($images) != 0)
                        @foreach ($images as $item)
                            <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                            <img src="{{ asset('storage/product_images/'.$item->image) }}" class="img-fluid img-thumbnail" style="width:100%; height:300px;">
                                    </div>
                                    <div class="card-footer">
                                        <div class="d-flex justify-content-end">
                                            <button class="btn btn-md btn-danger each_image_id" id="" data-imageId="{{ $item->id }}">{{ trans('globalText.product.delete_btn') }}</button>
                                        </div>
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
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://unpkg.com/sweetalert2@7.8.2/dist/sweetalert2.all.js"></script>
<script>
$(document).on('click','#delete_cover',function(){
    var coverImageId = $('#cover_image_id').val();
    Swal.fire({
        icon: 'warning',
        title: 'Are you sure to delete cover image?',
    })
    $('.swal2-confirm').on('click', function() {
        $.ajax({
            type: "GET",
            url: "{{ route('admin.product.deleteCoverImage',$data->id) }}",
            data: coverImageId,
            success: function(data){
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

$(document).on('click','.each_image_id',function(){
    var eachImageId = $(this).attr('data-imageId');
    Swal.fire({
        icon: 'warning',
        title: 'Are you sure to delete this image?',
    })
    $('.swal2-confirm').on('click', function() {
        $.ajax({
            type: "GET",
            url: "{{ route('admin.product.deleteEachImage',$item->id) }}",
            data: {image_id : eachImageId},
            success: function(data){
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

$(document).ready(function(){
    $(document).on('click','.update',function(){
        let formData = new FormData();
        let files = $('#product_images')[0].files;
        for (let i = 0; i < files.length; i++) {
            formData.append('product_images[]', files[i]);
        }
        formData.append('product_name',$('#product_name').val());
        formData.append('product_description',$('#product_description').val());
        formData.append('product_price',$('#product_price').val());
        formData.append('product_image',$('#product_image')[0].files[0]);
        formData.append('product_category',$('#product_category').val());
        formData.append('product_count',$('#product_count').val());
        formData.append('product_status',$('#product_status').val());
        formData.append('product_type',$('#product_type').val());
        formData.append('product_id',$("#product_id").val());

        $.ajax({
            type: "POST",
            url: "{{ route('admin.product.update') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: formData,
            processData: false,
            contentType: false,
            success: function(data){
                Swal.fire({
                    icon: 'success',
                    title: data,
                })
                $('.swal2-confirm').on('click', function() {
                    window.location.href = "{{ route('admin.product.productListPage') }}"
                })
            },
            error: function (xhr) {
               if (xhr.status == 422) {
                    Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please type something and add some images to create!',
                    })
               }
           }
        });

    });
});

</script>
@endsection





