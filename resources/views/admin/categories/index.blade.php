@extends('admin.layouts.index')
@section('title', 'Category Page')
@section('styles')
    <style>
        i.ti-plus.text-decoration-none.text-success {
            cursor: pointer;
        }

        i.ti-eye,
        .ti-pencil,
        .ti-trash {
            cursor: pointer;
        }

        .swal2-container.swal2-backdrop-show,
        .swal2-container.swal2-noanimation {
            background: rgba(0, 0, 0, .4);
            z-index: 99999;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-5 offset-1" style="margin-top: 50px;">
            @if (session('deleteSuccess'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{ session('deleteSuccess') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card">
                <div class="card-header text-center my-3 fs-5 justify-content-between d-flex">
                    {{ trans('globalText.food_category.title') }}
                    <i class="ti-plus text-decoration-none text-success" data-toggle="modal" data-target="#exampleModal"
                        title="Add Food Category"></i>
                </div>
                <div class="card-body">
                    @if (count($foodCategories) != 0)
                        @foreach ($foodCategories as $foodCategory)
                            <div class="justify-content-between d-flex mb-4">
                                <div class="" id="">
                                    {{ $foodCategory->name }}
                                </div>
                                <div class="">
                                    <a href="{{ route('admin.category.readFoodCategory', $foodCategory->id) }}"><i
                                            class="ti-eye mr-3 text-dark"></i></a>
                                    <a href="{{ route('admin.category.editFoodCategory', $foodCategory->id) }}"><i
                                            class="ti-pencil text-dark mr-3"></i></a>
                                    <a href="{{ route('admin.category.deleteFoodCategory', $foodCategory->id) }}"><i
                                            class="ti-trash text-dark"></i></a>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="text-danger text-center my-3 h4">There is no categories.</div>
                    @endif
                </div>
                <div class="mt-3">
                    {{ $foodCategories->links() }}
                </div>
            </div>
        </div>

        {{-- item category --}}

        <div class="col-5" style="margin-top: 50px;">
            @if (session('ItemdeleteSuccess'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{ session('ItemdeleteSuccess') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card">
                <div class="card-header text-center my-3 fs-5 justify-content-between d-flex">
                    {{ trans('globalText.item_category.title') }}
                    <i class="ti-plus text-decoration-none text-success" data-toggle="modal" data-target="#exampleModalTwo"
                        title="Add Item Category"></i>
                </div>

                <div class="card-body">
                    @foreach ($itemCategories as $itemCategory)
                        <div class="justify-content-between d-flex mb-4">
                            <div class="">
                                {{ $itemCategory->name }}
                            </div>
                            <div class="">
                                <a href="{{ route('admin.item.readItemCategory', $itemCategory->id) }}"><i
                                        class="ti-eye mr-3 text-dark"></i></a>
                                <a href="{{ route('admin.item.editItemCategory', $itemCategory->id) }}"><i
                                        class="ti-pencil mr-3 text-dark"></i></a>
                                <a href="{{ route('admin.item.deleteItemCategory', $itemCategory->id) }}"><i
                                        class="ti-trash text-dark"></i></a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mt-3">
                    {{ $itemCategories->links() }}
                </div>
            </div>
        </div>
    </div>
    <!--food Modal -->
    {{-- create --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ trans('globalText.food_category.add_foodCategory') }}
                    </h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" name="foodCategoryName" class="form-control my-3"
                        placeholder="{{ trans('globalText.food_category.foodCategoryName') }}" id="foodCategoryName">
                    <input type="text" name="foodCategoryDescription" class="form-control my-3"
                        placeholder="{{ trans('globalText.food_category.foodCategoryDescription') }}"
                        id="foodCategoryDescription">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit"
                        class="btn btn-primary create">{{ trans('globalText.food_category.create') }}</button>
                </div>
            </div>
        </div>
    </div>


    {{-- item modal  --}}
    <div class="modal fade" id="exampleModalTwo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelTwo"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ trans('globalText.item_category.add_itemCategory') }}
                    </h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" name="itemCategoryName" class="form-control my-3"
                        placeholder="{{ trans('globalText.item_category.itemCategoryName') }}" id="itemCategoryName">
                    <input type="text" name="itemCategoryDescription" class="form-control my-3"
                        placeholder="{{ trans('globalText.item_category.itemCategoryDescription') }}"
                        id="itemCategoryDescription">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit"
                        class="btn btn-primary createItemCategory">{{ trans('globalText.item_category.create') }}</button>
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
        //food category
        $(document).on('click', '.create', function() {
            var foodCategoryName = $("#foodCategoryName").val();
            var foodCategoryDescription = $("#foodCategoryDescription").val();
            if (foodCategoryName == '' || foodCategoryDescription == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please type something to create!',
                })
            }
            $.ajax({
                type: "POST",
                url: "{{ route('admin.category.createFoodCategory') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    food_category_name: foodCategoryName,
                    food_category_description: foodCategoryDescription
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

        //item category
        $(document).on('click', '.createItemCategory', function() {
            var itemCategoryName = $("#itemCategoryName").val();
            var itemCategoryDescription = $("#itemCategoryDescription").val();
            if (itemCategoryName == '' || itemCategoryDescription == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please type something to create!',
                })
            }
            $.ajax({
                type: "POST",
                url: "{{ route('admin.item.createItemCategory') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    item_category_name: itemCategoryName,
                    item_category_description: itemCategoryDescription
                },
                success: function(data) {
                    Swal.fire({
                        icon: 'success',
                        title: data,
                    })
                    $('.swal2-confirm').on('click', function() {
                        location.reload();
                    })
                },

            });
        })
    </script>


@endsection
