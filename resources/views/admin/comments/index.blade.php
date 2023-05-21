@extends('admin.layouts.index')
@section('title', 'Comment List')
@section('styles')
    <style>
        .colored-toast.swal2-icon-success {
            background-color: #a5dc86 !important;
        }

        .swal2-popup.swal2-toast .swal2-title {
            margin-top: 10px !important;
        }

        .cmtCard {
            box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 0.1);
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('admin.homepage') }}" class="text-dark text-decoration-none "><i
                            class="ti-arrow-left text-dark"></i></a>
                </div>
                <div class="card-body">
                    @foreach ($comments as $comment)
                        <div class="row cmtCard my-3 rounded">
                            <div class="col-lg-1 col-md-3 col-sm-3 col-12">
                                @if ($data->user_photo == null)
                                    <img src="{{ asset('home/admin/default.png') }}" alt="" srcset=""
                                        class="w-100 rounded-circle bg-secondary">
                                @else
                                    <img src="{{ asset('storage/' . $data->user_photo) }}" alt="" srcset=""
                                        class="rounded-circle" style="width:100px; height:100px;">
                                @endif
                            </div>
                            <div class="col-lg-11 col-md-6 col-sm-6 col-12">
                                <div class="d-flex">
                                    <h5>{{ $data->user_name }}<h6 class="text-muted mt-1 ml-3 mr-1">&#x2022;
                                            {{ \Carbon\Carbon::parse($comment->created_at)->setTimezone('Asia/Yangon')->diffForHumans() }}
                                        </h6>
                                    </h5>
                                </div>
                                <p class="text-dark">{{ $comment->message }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="card-footer">
                    <div class="d-flex">
                        <div class="w-100">
                            <input type="text" name="comment" id="comment" class="w-100 form-control comment"
                                placeholder="Write your comment here">
                        </div>
                        <input type="hidden" name="product_id" id="product_id" value="{{ $data->id }}">
                        <div class="">
                            <button class="btn btn-primary ms-2 send"><i class="fa-regular fa-paper-plane"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('home/customJs/comment.js') }}"></script>
@endsection
