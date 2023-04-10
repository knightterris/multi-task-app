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

        .followerCard {
            box-shadow: 0 0.25rem 0.5rem rgba(224, 224, 224, 0.8);
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-2 col-md-3 col-sm-6 col-12">
            @if (Auth::user()->photo == null)
                <img src="{{ asset('home/admin/default.png') }}" alt="" srcset=""
                    class="w-100 rounded-circle bg-secondary">
            @else
                <img src="{{ asset('storage/' . Auth::user()->photo) }}" alt="" srcset=""
                    class="w-100 rounded-circle">
            @endif
        </div>

        <div class="col-md-1"></div>
        <div class="col-md-3 col-sm-3 col-12">
            <h4 class="mt-5">{{ Auth::user()->name }}</h4>

            <div class="row">
                <div class="col-md-4 col-sm-4 col-12">
                    <div class="d-flex mt-3">
                        <p class="me-2">{{ $postsCount }}</p> Posts
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-12">
                    <div class="d-flex mt-3" data-bs-toggle="modal" data-bs-target="#followingModal">
                        <p class="me-2">3</p> Following
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-12">
                    <div class="d-flex mt-3" data-bs-toggle="modal" data-bs-target="#followerModal">
                        <p class="me-2">999K</p> Followers
                    </div>
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
                    <p class="h6 text-muted mt-1 text-left">{{ Auth::user()->works_at ?? '-' }}<i class="ti-pencil ms-3"
                            data-bs-toggle="modal" data-bs-target="#workModal"></i></p>
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
                    <p class="h6 text-muted mt-1 text-left">{{ Auth::user()->study_at ?? '-' }}</p>
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
                    <p class="h6 text-muted mt-1 text-left">{{ Auth::user()->address ?? '-' }}</p>
                </div>
            </div>
        </div>

    </div>

    <p class="my-3">{{ Auth::user()->bio ?? '' }}
    </p>
    <!--215 characters-->


    <!-- Follower Modal -->
    <div class="modal fade" id="followerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg p-3">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">People Who Follow You</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row followerCard rounded">
                        <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                            {{-- @if ($data->user_photo == null) --}}
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
        </div>
    </div>
    {{-- Following Modal --}}
    <div class="modal fade" id="followingModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg p-3">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">People You Follow</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row followerCard rounded">
                        <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                            {{-- @if ($data->user_photo == null) --}}
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
                                    <h5 class="mt-2">Jennie</h5>
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
        </div>
    </div>
    <hr>
    {{-- Study and Work Modal --}}
    <!-- Modal -->
    <div class="modal fade" id="workModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Profile Details</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="works_at">Work</label>
                    <input type="text" name="works_at" id="works_at" class="form-control"
                        placeholder="Enter where you work">

                    <label for="study_at" class="mt-2">Studied At</label>
                    <input type="text" name="study_at" id="study_at" class="form-control"
                        placeholder="Enter where you study ">

                    <label for="bio" class="mt-2">Bio</label>
                    <textarea name="bio" id="bio" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary saveChanges">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    {{-- My Products --}}
    <div class="container">
        @foreach ($data as $item)
            <div class="">
                <div class="card p-3" style="height:850px;">
                    <div class="card-header text-center">{{ $item->name }}</div>
                    {{-- <div class="card-body"> --}}
                    <div class="my-3 text-center">
                        @if ($item->image)
                            <a href="{{ asset('storage/product_images/' . $item->image) }} "><img
                                    src="{{ asset('storage/product_images/' . $item->image) }}" class="img-fluid"
                                    style="width:500px; height:300px; object-fit: contain;"></a>
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
                                    <i class="fa-solid fa-heart me-2 unlike-icon" id="unlike-icon"
                                        data-id="{{ $item->id }}"></i>
                                @else
                                    <i class="ti-heart me-2 like-icon" id="like-icon" data-id="{{ $item->id }}"></i>
                                @endif
                                <input type="hidden" class="likeCountVal" id="likeCountVal"
                                    value="{{ $item->like }}">
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

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/sweetalert2@7.8.2/dist/sweetalert2.all.js"></script>
    <script>
        let bioValue = '';
        $(document).on('input', '#bio', function() {
            bioLength = $('#bio').val().length
            if (bioLength > 215) {
                Swal.fire({
                    icon: 'error',
                    title: 'Words Limit Exceeded!',
                    text: 'You cannot type more than 215 words!',
                })
                bioValue = $('#bio').val();
                $('#bio').val(bioValue.substring(0, 216));
            }
        })
        $(document).on('click', '.saveChanges', function() {
            var works_at = $('#works_at').val();
            var study_at = $('#study_at').val();
            var bio = bioValue;
            $.ajax({
                type: "POST",
                url: "{{ route('admin.myWall.changeProfileDetails') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    worksAt: works_at,
                    studyAt: study_at,
                    bio: bio
                },
                success: function(data) {
                    Swal.fire({
                        icon: 'success',
                        title: data,
                    })
                    $('.swal2-confirm').on('click', function() {
                        location.reload();
                    })
                }
            });
        })
    </script>
@endsection
