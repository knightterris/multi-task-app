@extends('admin.layouts.index')
@section('title','Category Page')

@section('content')
<div class="row">
    <div class="col-6 offset-3" style="margin-top: 50px;">
        <div class="card">
            <div class="card-header text-center my-3">
                <div class="row">
                    <div class="col-1">
                        <a href="{{ route('admin.category.page') }}"><i class="ti-arrow-left text-dark"></i></a>
                    </div>
                    <div class="col">
                        {{ trans('globalText.food_category.title') }}
                    </div>
                </div>
            </div>
            <div class="card-body">
                <ul>
                    <li class="my-3">{{ $data->name }}</li>
                    <li class="my-3">{{ $data->description }}</li>
                </ul>
            </div>
        </div>
    </div>


</div>

@endsection






