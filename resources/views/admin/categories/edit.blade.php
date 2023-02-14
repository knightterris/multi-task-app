@extends('admin.layouts.index')
@section('title','Category Edit Page')

@section('content')
<div class="row">
    <div class="col-6 offset-3" style="margin-top: 50px;">
        <div class="card">
            <div class="card-header text-center my-3">
                <div class="row">
                    <div class="col-1">
                        <i class="ti-arrow-left text-dark" onclick="history.back()"></i>
                    </div>
                    <div class="col">
                        {{ trans('globalText.food_category.title') }}
                    </div>
                </div>
            </div>
            <div class="card-body">
                    <label for="name" class="form-label my-3">{{ trans('globalText.food_category.foodCategoryName') }}</label>
                    <input type="text" name="" id="updateCategoryName" class="form-control" value="{{ $data->name }}">
                    <label for="description" class="form-label my-3">{{ trans('globalText.food_category.foodCategoryDescription') }}</label>
                    <input type="text" name="" id="updateCategoryDescription" class="form-control" value="{{ $data->description }}">
                        <div class="d-flex justify-content-end mt-3">
                            <button type="submit" class="btn btn-primary update">{{ trans('globalText.product.update_btn') }}</button>
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
    $(document).on('click','.update',function(){
        var updateName = $('#updateCategoryName').val();
        var updateDescription = $('#updateCategoryDescription').val();
        if(updateName == '' || updateDescription == ''){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Please type something to create!',
                })
                $('.swal2-confirm').on('click', function() {
                    location.reload();
                })
        }
        $.ajax({
                type: "POST",
                url: "{{ route('admin.category.updateFoodCategory',$data->id) }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    food_category_name_update : updateName,
                    food_category_description_update : updateDescription
                },
                success: function(data) {
                        Swal.fire({
                            icon: 'success',
                            title: data,
                        })
                        $('.swal2-confirm').on('click', function() {
                            window.location.href = "{{ route('admin.category.page')}}";
                        })
                }
            });
    })
</script>
@endsection




