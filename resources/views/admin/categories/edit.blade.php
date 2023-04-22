@extends('admin.layouts.index')
@section('title', 'Category Edit Page')

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
                    <label for="name"
                        class="form-label my-3">{{ trans('globalText.food_category.foodCategoryName') }}</label>
                    <input type="text" name="" id="updateCategoryName" class="form-control"
                        value="{{ $data->name }}">
                    <label for="description"
                        class="form-label my-3">{{ trans('globalText.food_category.foodCategoryDescription') }}</label>
                    <input type="text" name="" id="updateCategoryDescription" class="form-control"
                        value="{{ $data->description }}">
                    <div class="d-flex justify-content-end mt-3">
                        <button type="submit"
                            class="btn btn-primary update">{{ trans('globalText.product.update_btn') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('home/customJs/category.js') }}"></script>
@endsection
