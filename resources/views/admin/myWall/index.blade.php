@extends('admin.layouts.index')
@section('title', 'My Wall')
@section('styles')
    <style>
        .colored-toast.swal2-icon-success {
            background-color: #a5dc86 !important;
        }

        .swal2-popup.swal2-toast .swal2-title {
            margin-top: 10px !important;
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-2 col-md-3 col-sm-6 col-12">
            {{-- @if ($data->user_photo == NULL) --}}
                <img src="{{ asset('home/admin/default.png') }}" alt="" srcset=""
                class="w-100 rounded-circle bg-secondary">
            {{-- @else --}}
                {{-- <img src="{{ asset('storage/'.$data->user_photo) }}" alt="" srcset=""
                class="w-100 rounded-circle">
            @endif --}}
        </div>
        {{-- <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <img src="{{ asset('home/images/product_02.jpg') }}" class="rounded-circle" alt="" srcset="" style="">
        </div> --}}
        <div class="col-md-1"></div>
        <div class="col-md-3 col-sm-3 col-12">
            <h4 class="mt-5">Aung Kaung Myat</h4>

            <div class="row">
                <div class="col-md-4 col-sm-4 col-12">
                    {{-- <div class="d-flex">
                        <i class="fa-solid fa-blog me-2"></i> Posts
                    </div> --}}
                    <a href="" class="text-decoration-none">
                        <div class="d-flex mt-3">
                            <p class="me-2">3</p> Posts
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-sm-4 col-12">
                    {{-- <div class="d-flex">
                        <i class="fa-solid fa-handshake-angle me-2"></i> Following
                    </div> --}}
                    <a href="" class="text-decorationi-none">
                        <div class="d-flex mt-3">
                            <p class="me-2">3</p> Following
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-sm-4 col-12">
                    {{-- <div class="d-flex">
                        <i class="fa-solid fa-users me-2"></i> Followers
                    </div> --}}
                    <a href="{{ route('admin.myWall.Followers') }}" class="text-decoration-none">
                        <div class="d-flex mt-3">
                            <p class="me-2">999K</p> Followers
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-12 mt-5">
            <div class="row">
                <div class="col-lg-1 col-md-1 col-sm-1 col-12">
                    <i class="fa-solid fa-briefcase"></i>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-12">
                    <p class="h6 text-muted mt-1">Works At</p>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-5 col-12">
                    <p class="h6 text-muted mt-1 text-left">Host Myanmar Technology</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-1 col-md-1 col-sm-1 col-12">
                    <i class="fa-solid fa-graduation-cap"></i>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-12">
                    <p class="h6 text-muted mt-1">Studied At</p>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-5 col-12">
                    <p class="h6 text-muted mt-1 text-left">New Myanmar University</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-1 col-md-1 col-sm-1 col-12">
                    <i class="fa-solid fa-location-dot"></i>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-12">
                    <p class="h6 text-muted mt-1">Live In</p>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-5 col-12">
                    <p class="h6 text-muted mt-1 text-left">Yangon, Myanmar</p>
                </div>
            </div>
        </div>

    </div>

    <p class="my-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt delectus aliquam dolor error ea eos assumenda itaque, nihil repudiandae suscipit corrupti commodi optio ipsam pariatur odit, at accusantium culpa ut!
    </p> <!--215 characters-->
    <hr>
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
