@extends('admin.layouts.index')
@section('title','Dashboard')
@section('styles')
<style>
    .ti-heart{
        cursor: pointer;
    }
</style>
@endsection
@section('content')
<div class="row">
    @foreach ($data as $item)
    <div class="col-4">

            <div class="card p-3" style="height:800px;">
                <div class="card-header text-center">{{ $item->name }}</div>
                {{-- <div class="card-body"> --}}
                    <div class="my-3">
                        @if ($item->image)
                            <a href="{{ asset('storage/product_images/'.$item->image) }} "><img src="{{ asset('storage/product_images/'.$item->image) }}" class="img-fluid img-thumbnail" style="width:500px; height:300px;"></a>
                        @else
                            <img src="{{ asset('home/admin/no-image.png') }}" class="img-fluid img-thumbnail" style="width:500px; height:300px;">
                        @endif
                    </div>
                {{-- </div> --}}
                <div class="card-footer">
                    <div class="my-3 d-flex justify-content-between">
                        <h6>Created By</h6>
                        <span>{{ $item->created_by }}</span>
                    </div>
                    <div class="my-3 d-flex justify-content-between">
                        <h6>Product Name</h6>
                        <span>{{ $item->name }}</span>
                    </div>
                    <div class="my-3 d-flex justify-content-between">
                        <h6>Product Type</h6>
                        @if($item->product_type == 0) <span class="badge badge-success">Food</span> @endif
                        @if($item->product_type == 1) <span class="badge badge-success">Item</span> @endif
                    </div>
                    <div class="my-3 d-flex justify-content-between">
                        <h6>Product Status</h6>
                        @if($item->status == 0) <span class="badge badge-success">In-stock</span> @endif
                        @if($item->status == 1) <span class="badge badge-danger">Out-of-stock</span> @endif

                    </div>
                    <div class="my-3 ">
                        <h6>Description</h6>
                        <span>{{ Str::limit($item->description, 200) }}</span>
                    </div>
                </div>
                <div class="card-footer mb-3">
                    <div class="d-flex justify-content-between">
                        <div class="mt-2" >
                                <i class="ti-heart me-2" data-id="{{ $item->id }}" ></i>
                                <span class="">20 Likes</span>
                            <a href="{{ route('admin.product.show',$item->id) }}"><i class="ti-eye ml-3 text-dark" title="See Details"></i></a>
                        </div>
                        <button class="btn btn-primary">
                            <i class="ti-download"></i>
                            WishList
                        </button>
                    </div>
                </div>
            </div>

        </div>
        {{-- to add  wishlist -> data-id={{ data->id }} --}}
        @endforeach
</div>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://unpkg.com/sweetalert2@7.8.2/dist/sweetalert2.all.js"></script>
<script>

    $(document).on('click','.ti-heart',function(){
        var eachId = $(this).attr('data-id');
        alert(eachId)
    })
</script>
@endsection





