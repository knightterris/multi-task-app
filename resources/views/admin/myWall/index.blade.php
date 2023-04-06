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
            <h4 class="mt-5">{{ Auth::user()->name }}</h4>

            <div class="row">
                <div class="col-md-4 col-sm-4 col-12">
                    <a href="" class="text-decoration-none">
                        <div class="d-flex mt-3">
                            <p class="me-2">{{ $postsCount }}</p> Posts
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-sm-4 col-12">
                    <a href="" class="text-decorationi-none">
                        <div class="d-flex mt-3">
                            <p class="me-2">3</p> Following
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-sm-4 col-12">
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

    <div class="container">
        @foreach ($data as $item)
            <div class="">
                <div class="card p-3" style="height:850px;">
                    <div class="card-header text-center">{{ $item->name }}</div>
                    {{-- <div class="card-body"> --}}
                    <div class="my-3 text-center">
                        @if ($item->image)
                            <a href="{{ asset('storage/product_images/' . $item->image) }} "><img
                                    src="{{ asset('storage/product_images/' . $item->image) }}"
                                    class="img-fluid" style="width:500px; height:300px; object-fit: contain;"></a>
                        @else
                            <img src="{{ asset('home/admin/no-image.png') }}" class="img-fluid"
                                style="width:500px; height:300px; object-fit: contain;">
                        @endif
                    </div>
                    {{-- </div> --}}
                    <div class="card-footer">
                        <div class="my-3 d-flex justify-content-between">
                            <h6>Created By</h6>
                            <span>{{ $item->created_by }}</span>
                        </div>
                        <div class="my-3 d-flex justify-content-between">
                            <h6>Created At</h6>
                            <span>{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</span>
                        </div>
                        <div class="my-3 d-flex justify-content-between">
                            <h6>Updated At</h6>
                            <span>{{ \Carbon\Carbon::parse($item->updated_at)->diffForHumans() }}</span>
                        </div>
                        <div class="my-3 d-flex justify-content-between">
                            <h6>Product Name</h6>
                            <span>{{ $item->name }}</span>
                        </div>
                        <div class="my-3 d-flex justify-content-between">
                            <h6>Product Type</h6>
                            @if ($item->product_type == 0)
                                <span class="badge badge-success">Food</span>
                            @endif
                            @if ($item->product_type == 1)
                                <span class="badge badge-success">Item</span>
                            @endif
                        </div>
                        <div class="my-3 d-flex justify-content-between">
                            <h6>Product Status</h6>
                            @if ($item->status == 0)
                                <span class="badge badge-success">In-stock</span>
                            @endif
                            @if ($item->status == 1)
                                <span class="badge badge-danger">Out-of-stock</span>
                            @endif

                        </div>
                        <div class="my-3 ">
                            <h6>Description {{ $item->id }}</h6>
                            <span>{{ Str::limit($item->description, 100) }}</span>
                        </div>
                    </div>
                    <div class="card-footer mb-3">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-12">
                                @if ($item->like_status == 'liked')
                                    <i class="fa-solid fa-heart me-2 unlike-icon" id="unlike-icon" data-id="{{ $item->id }}"></i>
                                @else
                                    <i class="ti-heart me-2 like-icon" id="like-icon" data-id="{{ $item->id }}"></i>
                                @endif
                                <input type="hidden" class="likeCountVal" id="likeCountVal" value="{{ $item->like }}">
                                <span class="me-5 likeCountShow" id="likeCountShow">{{ $item->like }}</span>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-3 col-12">
                                <a href="{{ route('admin.product.commentList', $item->id) }}"><i
                                        class="fa-regular fa-comments text-dark me-3"></i>{{ $item->comment }}</a>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-3 col-12">
                                <a href="{{ route('admin.product.show', $item->id) }}"><i class="ti-eye ml-3 text-dark"
                                        title="See Details"></i></a>
                            </div>


                        </div>

                    </div>
                </div>
            </div>
        @endforeach
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
