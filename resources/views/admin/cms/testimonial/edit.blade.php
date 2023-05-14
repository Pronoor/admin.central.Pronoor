@extends('adminlte::page')
@section('title', 'Cms::Menubar')


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
                <h1>Testimonial::Update</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Testimonial</li>
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
                        <a type="button" href="{{route('admin.testimonial')}}" class="btn btn-sm btn-primary">Back</a>
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
                        <form method="post" action="{{ route('admin.testimonial.update',$testimonials->id) }}" id="quickForm">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Quote</label>
                                    <textarea class="form-control" name="quote" id="quote" rows="3">{{ $testimonials->quote }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Quotes given by</label>
                                    <input type="text" class="form-control" name="quotes_given_by" id="quotes_given_by"
                                        value="{{ $testimonials->quotes_given_by }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Quotes given by profession</label>
                                    <input type="text" class="form-control" name="quotes_given_by_profession"
                                        id="quotes_given_by_profession" value="{{ $testimonials->quotes_given_by_profession }}">
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
        $(function() {
            // $.validator.setDefaults({
            //     submitHandler: function () {
            //         $('#quickForm').submit();
            //     }
            // });
            $('#quickForm').validate({
                rules: {
                    quote: {
                        required: true,
                    },
                    quotes_given_by: {
                        required: true,
                    },
                    quotes_given_by_profession: {
                        required: true
                    },
                },
                messages: {
                    quote: {
                        required: "Please enter a quote",
                    },
                    quotes_given_by: {
                        required: "Please enter a quotes_given_by",
                    },
                    quotes_given_by_profession: {
                        required: "Please enter a quotes_given_by_profession",
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
