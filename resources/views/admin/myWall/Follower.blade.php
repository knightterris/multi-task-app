@extends('admin.layouts.index')
@section('title', 'Followers')
@section('styles')
    <style>
        .colored-toast.swal2-icon-success {
            background-color: #a5dc86 !important;
        }

        .swal2-popup.swal2-toast .swal2-title {
            margin-top: 10px !important;
        }
        .followerCard{
            box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 0.8);
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-12 offset-3">
            <div class="row followerCard my-1 py-3 rounded">
                <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                    {{-- @if ($data->user_photo == NULL) --}}
                        <img src="{{ asset('home/admin/default.png') }}" alt="" srcset=""
                        class="w-100 rounded-circle bg-secondary">
                    {{-- @else
                        <img src="{{ asset('storage/'.$data->user_photo) }}" alt="" srcset=""
                        class="w-100 rounded-circle">
                    @endif --}}
                </div>
                <div class="col-lg-10 col-md-6 col-sm-6 col-12">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="mt-2">Aung Kaung Myat</h5>
                            <span class="text-muted">Follows you</span>
                        </div>
                        <div class="col-md-1 offset-3">
                            <div class="d-flex">
                                <button class="btn btn-primary">Follow</button>
                                <button class="btn btn-dark">Followed</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
        integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/sweetalert2@7.8.2/dist/sweetalert2.all.js"></script>
    <script>

    </script>
@endsection
