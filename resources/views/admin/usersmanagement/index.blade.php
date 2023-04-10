@extends('admin.layouts.index')
@section('title', 'User Management')


@section('content')
    <div class="row">
        <div class="container">
            @if (session('updateSuccess'))
                <div class="alert alert-success alert-dismissible fade show my-2" role="alert">
                    <strong>{{ session('updateSuccess') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session('deleteSuccess'))
                <div class="alert alert-success alert-dismissible fade show my-2" role="alert">
                    <strong>{{ session('deleteSuccess') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Address</th>
                        <th scope="col">Phone</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>
                                @if ($item->photo == null)
                                    <img src="{{ asset('home/admin/default.png') }}" alt="" srcset=""
                                        style="width:200px; height:200px;" class="rounded-circle bg-secondary">
                                @else
                                    <img src="{{ asset('storage/' . $item->photo) }}" alt="" srcset=""
                                        style="width:200px; height:200px;" class="rounded-circle">
                                @endif
                            </td>

                            <td>
                                {{ $item->name }}
                            </td>

                            <td>
                                {{ $item->email }}
                            </td>

                            <td>
                                {{ $item->address }}
                            </td>

                            <td>
                                {{ $item->phone }}
                            </td>
                            @if (Auth::user()->id == $item->id)
                                <td></td>
                            @else
                                <td>
                                    <a href="{{ route('admin.users.show', $item->id) }}" class="mx-1">
                                        <i class="ti-eye text-dark" title="Show User"></i>
                                    </a>

                                    <a href="{{ route('admin.users.edit', $item->id) }}" class="mx-1">
                                        <i class="ti-pencil text-dark" title="Edit User"></i>
                                    </a>

                                    <a href="{{ route('admin.users.delete', $item->id) }}" class="mx-1">
                                        <i class="ti-trash text-dark" title="Delete User"></i>
                                    </a>
                                </td>
                            @endif
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection

