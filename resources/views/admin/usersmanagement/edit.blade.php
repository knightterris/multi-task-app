@extends('admin.layouts.index')
@section('title', 'Profile Edit Page')
@section('content')
    <div class="row">
        <div class="col-6 offset-3">
            <div class="card">
                <div class="card-header text-center py-3">{{ trans('globalText.admin.profile') }}</div>
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
                            <div class="col-12">
                                <form action="{{ route('admin.users.update', $data->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <label for="">{{ trans('globalText.admin.name') }}</label>
                                    <input
                                        class="form-control mb-2  @error('name') is-invalid
                                                    @enderror"
                                        type="text" name="name" value="{{ $data->name }}">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small><br>
                                    @enderror


                                    <label for="">{{ trans('globalText.admin.email') }}</label>
                                    <input
                                        class="form-control mb-2  @error('email')
                                                        is-invalid
                                                    @enderror"
                                        type="text" name="email" value="{{ $data->email }}">
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small><br>
                                    @enderror


                                    <label for="">{{ trans('globalText.admin.photo') }}</label>
                                    <input
                                        class="form-control mb-2  @error('image')
                                                        is-invalid
                                                    @enderror"
                                        type="file" name="image">
                                    @error('image')
                                        <small class="text-danger">{{ $message }}</small><br>
                                    @enderror


                                    <label for="">{{ trans('globalText.admin.phone') }}</label>
                                    <input
                                        class="form-control mb-2  @error('phone')
                                                        is-invalid
                                                    @enderror"
                                        type="number" name="phone" value="{{ $data->phone }}" min="0"
                                        oninput="this.value = Math.abs(this.value)">
                                    @error('phone')
                                        <small class="text-danger">{{ $message }}</small><br>
                                    @enderror

                                    <label for="">{{ trans('globalText.admin.address') }}</label>
                                    <input
                                        class="form-control mb-2  @error('address')
                                                        is-invalid
                                                    @enderror"
                                        type="text" name="address" value="{{ $data->address }}">
                                    @error('address')
                                        <small class="text-danger">{{ $message }}</small><br>
                                    @enderror

                                    <label for="">{{ trans('globalText.admin.gender') }}</label>
                                    <select name="gender" id="" class="form-control">
                                        <option value="">Choose gender</option>
                                        <option value="male"@if ($data->gender == 'male') selected @endif>Male
                                        </option>
                                        <option value="female"@if ($data->gender == 'female') selected @endif>Female
                                        </option>
                                    </select>
                                    @error('gender')
                                        <small class="text-danger">{{ $message }}</small><br>
                                    @enderror

                                    <label for="">{{ trans('globalText.admin.role') }}</label>
                                    <select name="role" id="" class="form-control">
                                        <option value="">Choose Role</option>
                                        <option value="admin"@if ($data->role == 'admin') selected @endif>Admin
                                        </option>
                                        <option value="user"@if ($data->role == 'user') selected @endif>User
                                        </option>
                                    </select>
                                    @error('gender')
                                        <small class="text-danger">{{ $message }}</small><br>
                                    @enderror



                                    <div class="mt-3 d-flex justify-content-end">

                                        <a href="{{ route('admin.users.list') }}">
                                            <button
                                                class="btn btn-primary mt-3 mr-3">{{ trans('globalText.admin.back') }}</button>
                                        </a>
                                        <button type="submit"
                                            class=" btn btn-sm btn-primary mt-3 ms-3">{{ trans('globalText.admin.update_profile') }}</button>
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
