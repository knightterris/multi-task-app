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
    <script src="{{ asset('home/customJs/category.js') }}"></script>
@endsection
