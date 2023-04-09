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
                    <a href="{{ route('admin.homepage') }}" class="text-dark text-decoration-none"><i
                            class="ti-arrow-left text-dark"></i></a>
                </div>
                <div class="card-body">
                    @foreach ($comments as $comment)
                        <div class="row cmtCard my-3 rounded">
                            <div class="col-lg-1 col-md-3 col-sm-6 col-12">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
        integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/sweetalert2@7.8.2/dist/sweetalert2.all.js"></script>
    <script>
        $(document).on('click', '.send', function() {
            var msg = $('#comment').val();
            var productId = $('#product_id').val();
            $.ajax({
                type: "POST",
                url: "{{ route('admin.product.addComment') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    message: msg,
                    product_id: productId,
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
        $(document).on('input', '.comment', function() {
            var commentLength = $('#comment').val().length; //max 75
            var currentValue = $('#comment').val();
            if (commentLength > 75) {
                $('#comment').replaceWith(
                    "<textarea class='form-control commetTextarea' type='text' id='comment' name='comment' rows='5'>" +
                    currentValue + "</textarea>");
                $('.commetTextarea').css('height', '100px');
            }
        })
    </script>
@endsection
