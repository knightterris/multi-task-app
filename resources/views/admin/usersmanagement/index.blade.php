@extends('admin.layouts.index')
@section('title', 'User Management')


@section('content')
    <div class="row">
        <div class="container">
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
                            <td>
                                <a href="">
                                    <i class="ti-eye"></i>
                                </a>

                                <a href="">
                                    <i class="ti-pencil"></i>
                                </a>

                                <a href="">
                                    <i class="ti-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
        integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/sweetalert2@7.8.2/dist/sweetalert2.all.js"></script>

@endsection
