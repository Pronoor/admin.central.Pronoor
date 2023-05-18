@extends('adminlte::page')
@section('title', 'Cms::Product')


@push('css')
    <link rel="stylesheet" href="{{ asset('vendor/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/plugins/summernote/summernote-bs4.min.css') }}">
@endpush

@section('css')

@stop

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Product::Create</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Products</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <a type="button" href="{{ route('admin.products') }}" class="btn btn-sm btn-primary">Back</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-default-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <ul class="p-0 m-0" style="list-style: none;">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="post" action="{{ route('admin.products.store') }}" id="quickForm" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="category_id">Category Name</label>
                                    <select name="category_id" id="category_id" class="form-control">
                                        <option value="">-Select One-</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name">Product Name</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="Enter product name" value="{{ old('name') }}">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description" id="description">
                                        Place <em>some</em> <u>
                                        text</u> <strong>here</strong>
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="meta_name">Meta Name</label>
                                    <input type="text" class="form-control" name="meta_name" id="meta_name"
                                        placeholder="Enter meta name" value="{{ old('meta_name') }}">
                                </div>
                                <div class="form-group">
                                    <label for="meta_description">Meta Description</label>
                                    <textarea class="form-control" name="meta_description" id="meta_description">
                                        Place <em>some</em> <u>
                                        text</u> <strong>here</strong>
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="text" class="form-control" name="price" id="price"
                                        placeholder="Enter price" value="{{ old('price') }}">
                                </div>
                                <div class="form-group">
                                    <label for="discount">Discount</label>
                                    <input type="text" class="form-control" name="discount" id="discount"
                                        placeholder="Enter discount" value="{{ old('discount') }}">
                                </div>
                                <div class="form-group">
                                    <label for="image" class="col-sm-2 col-form-label">Photo</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="image" id="image"
                                                    class="custom-file-input">
                                                <label class="custom-file-label" for="exampleInputFile">Choose
                                                    file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
@stop

@push('js')
    <script src="{{ asset('vendor/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('vendor/plugins/summernote/summernote-bs4.min.js') }}"></script>
@endpush

@section('js')
    <script>
        $('#description').summernote({
            'height': '250px'
        })
        $('#meta_description').summernote({
            'height': '250px'
        })
        $(function() {
            // $.validator.setDefaults({
            //     submitHandler: function () {
            //         $('#quickForm').submit();
            //     }
            // });
            $('#quickForm').validate({
                rules: {
                    category_id: {
                        required: true,
                    },
                    name: {
                        required: true,
                    },
                    description: {
                        required: true,
                    },
                    meta_name: {
                        required: true,
                    },
                    meta_description: {
                        required: true,
                    },
                    price: {
                        required: true,
                    },
                    discount: {
                        required: true,
                    },
                    image: {
                        required: true,
                    },
                },
                messages: {
                    category_id: {
                        required: "Please enter a category id",
                    },
                    name: {
                        required: "Please enter a name",
                    },
                    description: {
                        required: "Please enter a description",
                    },
                    meta_name: {
                        required: "Please enter a meta name",
                    },
                    meta_description: {
                        required: "Please enter a meta description",
                    },
                    price: {
                        required: "Please enter a price",
                    },
                    discount: {
                        required: "Please enter a discount",
                    },
                    image: {
                        required: "Please enter a image",
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
@stop
