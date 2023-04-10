@extends('admin.layouts.index')
@section('title', 'Profile Page')
@section('content')
    <div class="row">
        <div class="col-6 offset-3">
            <div class="card">
                <div class="card-header row">
                    <div class="col-1">
                        <i class="ti-arrow-left text-dark" onclick="history.back()"></i>
                    </div>
                    <div class="col text-center">
                        {{ trans('globalText.admin.profile') }}
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-6 offset-3 my-3">
                        @if ($data->photo == null)
                            <img src="{{ asset('home/admin/default.png') }}" class="img-thumbnail">
                        @else
                            <img src="{{ asset('storage/' . $data->photo) }}" class="img-thumbnail">
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
                                    <li class="py-3">
                                        <p class="text-center ">{{ trans('globalText.admin.role') }}</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 col-12 offset-1">
                                <ul>
                                    <li class="py-3">
                                        <p class="text-dark">{{ $data->name }}</p>
                                    </li>
                                    <li class="py-3">
                                        <p class="text-dark">{{ $data->email }}</p>
                                    </li>
                                    <li class="py-3">
                                        <p class="text-dark">
                                            @if ($data->phone == null)
                                                -
                                            @else
                                                {{ $data->phone }}
                                            @endif
                                        </p>
                                    </li>
                                    <li class="py-3">
                                        <p class="text-dark">
                                            @if ($data->address == null)
                                                -
                                            @else
                                                {{ $data->address }}
                                            @endif
                                        </p>
                                    </li>
                                    <li class="py-3">
                                        <p class="text-dark">
                                            @if ($data->gender == null)
                                                -
                                            @elseif ($data->gender == 'male')
                                                {{ trans('globalText.admin.male') }}
                                            @else
                                                {{ trans('globalText.admin.female') }}
                                            @endif
                                        </p>
                                    </li>
                                    <li class="py-3">
                                        <p class="text-dark">
                                            {{ $data->role }}
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="card-footer d-flex justify-content-end">

                <a href="{{ route('admin.editProfile') }}">
                    <button class="btn btn-primary">{{ trans('globalText.admin.edit_profile') }}</button>
                </a>
            </div> --}}
            </div>
        </div>
    </div>
@endsection
