@extends('admin.layouts.index')
@section('title', 'Item Edit Page')

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
                            {{ trans('globalText.item_category.title') }}
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <label for="name"
                        class="form-label my-3">{{ trans('globalText.item_category.itemCategoryName') }}</label>
                    <input type="text" name="" id="updateItemName" class="form-control"
                        value="{{ $data->name }}">
                    <label for="description"
                        class="form-label my-3">{{ trans('globalText.item_category.itemCategoryDescription') }}</label>
                    <input type="text" name="" id="updateItemDescription" class="form-control"
                        value="{{ $data->description }}">
                    <div class="d-flex justify-content-end mt-3">
                        <button type="submit" class="btn btn-primary update">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).on('click', '.update', function() {
            var updateName = $('#updateItemName').val();
            var updateDescription = $('#updateItemDescription').val();
            if (updateName == '' || updateDescription == '') {
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
                url: "{{ route('admin.item.updateItemCategory', $data->id) }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    item_category_name_update: updateName,
                    item_category_description_update: updateDescription
                },
                success: function(data) {
                    Swal.fire({
                        icon: 'success',
                        title: data,
                    })
                    $('.swal2-confirm').on('click', function() {
                        window.location.href = "{{ route('admin.category.page') }}";
                    })
                }
            });
        })
    </script>
@endsection
