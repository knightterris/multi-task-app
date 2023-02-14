@extends('admin.layouts.index')
@section('title','Change Password Page')
@section('content')
<div class="row">
    <div class="col-6 offset-3">
        @if (session('passwordChanged'))
                    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                        <strong>{{ session('passwordChanged') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session('notMatch'))
                    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                        <strong>{{ session('notMatch') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
        <div class="card">
            <div class="card-header text-center py-3">{{ trans('globalText.admin.profile') }}</div>

            <div class="card-body">
                <div class="mt-3">
                    <div class="row">
                        <div class="col-12">

                            <form action="{{ route('admin.changePassword') }}" method="post"
                            >
                            @csrf
                                <label for="">{{ trans('globalText.admin.oldPassword') }}</label>
                                <input class="form-control mb-2  @error('oldPassword') is-invalid
                                                    @enderror"
                                    type="password" name="oldPassword" >
                                @error('oldPassword')
                                    <small class="text-danger">{{ $message }}</small><br>
                                @enderror

                                <label for="">{{ trans('globalText.admin.newPassword') }}</label>
                                <input class="form-control mb-2  @error('newPassword') is-invalid
                                                    @enderror"
                                    type="password" name="newPassword" >
                                @error('newPassword')
                                    <small class="text-danger">{{ $message }}</small><br>
                                @enderror

                                <label for="">{{ trans('globalText.admin.passwordConfirmation') }}</label>
                                <input class="form-control mb-2  @error('passwordConfirmation') is-invalid
                                                    @enderror"
                                    type="password" name="passwordConfirmation" >
                                @error('passwordConfirmation')
                                    <small class="text-danger">{{ $message }}</small><br>
                                @enderror

                            <div class="mt-3 d-flex justify-content-end">
                                <button type="submit" class=" btn btn-sm btn-primary mt-3 ms-3">{{ trans('globalText.admin.updatePassword') }}</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
