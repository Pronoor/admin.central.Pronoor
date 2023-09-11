@extends('adminlte::page')
@section('title', 'Cms::Service')


@push('css')
    <link rel="stylesheet" href="{{ asset('vendor/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush

@section('css')

@stop

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Service::Update</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Service</li>
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
                        <a type="button" href="{{ route('admin.service') }}" class="btn btn-sm btn-primary">Back</a>
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
                        <form method="post" action="{{ route('admin.service.update', $services->id) }}" id="quickForm"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" name="title" id="title"
                                           value="{{ $services->title }}">
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description" id="description"
                                              rows="3">{{ $services->description }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="types">Types</label>
                                    <select class="form-control" name="types" id="types">
                                        <option
                                            value="phone_sms" {{ $services->types == 'phone_sms' ? 'selected' : '' }}>
                                            Phone and SMS
                                        </option>
                                        <option value="faxes" {{ $services->types == 'faxes' ? 'selected' : '' }}>
                                            Faxes
                                        </option>
                                        <option
                                            value="directory" {{ $services->types == 'directory' ? 'selected' : '' }}>
                                            Directory
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control" name="image" id="service_photos">
                                    @if ($services->image)
                                        <img style="width: 60px"
                                             src="{{ asset('uploads/service_photos/' . $services->image) }}"
                                             alt="not found">
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="links">Links</label>
                                    <input type="text" class="form-control" name="links" id="links"
                                           value="{{ $services->links }}">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
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
@endpush

@section('js')
    <script>
        $(function () {
            // $.validator.setDefaults({
            //     submitHandler: function () {
            //         $('#quickForm').submit();
            //     }
            // });
            $('#quickForm').validate({
                rules: {
                    title: {
                        required: true,
                    },
                    description: {
                        required: true,
                    },
                    types: {
                        required: true,
                    },
                    links: {
                        required: true,
                    },
                },
                messages: {
                    title: {
                        required: "Please enter a title",
                    },
                    description: {
                        required: "Please enter a description",
                    },
                    types: {
                        required: "Please select a type",
                    },
                    links: {
                        required: "Please enter links",
                    },
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
@stop
