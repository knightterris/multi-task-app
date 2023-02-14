@extends('admin.layouts.index')
@section('title','Profile Page')
@section('content')
<div class="row">
    <div class="col-6 offset-3">
        <div class="card">
            <div class="card-header text-center py-3">{{ trans('globalText.admin.profile') }}</div>
            <div class="card-body">
                <div class="col-6 offset-3 my-3">
                    @if (Auth::user()->photo == null)
                        <img src="{{ asset('home/admin/default.png') }}" class="img-thumbnail">
                    @else
                    <img src="{{ asset('storage/' . Auth::user()->photo) }}" class="img-thumbnail">
                    @endif
                </div>
                <div class="mt-3">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 col-12">
                            <ul>
                                <li class="py-3">
                                    <p class="text-center ">{{ trans('globalText.admin.name') }}</p>
                                </li>
                                <li class="py-3">
                                    <p class="text-center ">{{ trans('globalText.admin.email') }}</p>
                                </li>
                                <li class="py-3">
                                    <p class="text-center ">{{ trans('globalText.admin.phone') }}</p>
                                </li>
                                <li class="py-3">
                                    <p class="text-center ">{{ trans('globalText.admin.address') }}</p>
                                </li>
                                <li class="py-3">
                                    <p class="text-center ">{{ trans('globalText.admin.gender') }}</p>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 col-12 offset-1">
                            <ul>
                                <li class="py-3">
                                    <p class="text-dark">{{ Auth::user()->name }}</p>
                                </li>
                                <li class="py-3">
                                    <p class="text-dark">{{ Auth::user()->email }}</p>
                                </li>
                                <li class="py-3">
                                    <p class="text-dark">
                                        @if (Auth::user()->phone == NULL)
                                            -
                                        @else
                                            {{ Auth::user()->phone }}
                                        @endif
                                    </p>
                                </li>
                                <li class="py-3">
                                    <p class="text-dark">
                                        @if (Auth::user()->address == NULL)
                                            -
                                        @else
                                            {{ Auth::user()->address }}
                                        @endif
                                    </p>
                                </li>
                                <li class="py-3">
                                    <p class="text-dark">
                                        @if (Auth::user()->gender == NULL)
                                            -
                                            @elseif (Auth::user()->gender == 'male')
                                                {{ trans('globalText.admin.male') }}
                                            @else
                                            {{ trans('globalText.admin.female') }}
                                        @endif
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-end">

                <a href="{{ route('admin.editProfile') }}">
                    <button class="btn btn-primary">{{ trans('globalText.admin.edit_profile') }}</button>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
