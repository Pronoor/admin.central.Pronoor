@extends('adminlte::page')
@section('title', 'Cms::User')


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
                <h1>User::Update</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">User</li>
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
                        <a type="button" href="{{route('admin.users')}}" class="btn btn-sm btn-primary">Back</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @if(count($errors) > 0 )
                            <div class="alert alert-default-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <ul class="p-0 m-0" style="list-style: none;">
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="post" action="{{route('admin.users.update',$users->id)}}" id="quickForm">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter name" value="{{ $users->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">User Type</label>
                                    <select name="user_type" id="user_type" class="form-control">
                                        @if ($users->user_type == 'Customer')
                                            <option value="{{ $users->user_type }}">{{ $users->user_type }}</option>
                                            <option value="Admin">Admin</option>
                                        @else
                                            <option value="{{ $users->user_type }}">{{ $users->user_type }}</option>
                                            <option value="Customer">Customer</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="gender">Gender</label>
                                    <select name="gender" id="gender" class="form-control">
                                        @if ($users->gender == 'Male')
                                            <option value="{{ $users->gender }}">{{ $users->gender }}</option>
                                            <option value="Female">Female</option>
                                        @else
                                            <option value="{{ $users->gender }}">{{ $users->gender }}</option>
                                            <option value="Male">Male</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="description">Decription</label>
                                    <textarea class="form-control" name="description" id="description" rows="3" placeholder="Enter desciption">{{ $users->description }}</textarea>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
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
                    name: {
                        required: true,
                    },
                    email: {
                        required: true,
                    },
                    password: {
                        required: true,
                    },
                    user_type: {
                        required: true,
                    },
                    gender: {
                        required: true,
                    },
                    // description: {
                    //     required: true,
                    // },
                },
                messages: {
                    name: {
                        required: "Please enter a name",
                    },
                    email: {
                        required: "Please enter a email",
                    },
                    password: {
                        required: "Please enter a password",
                    },
                    user_type: {
                        required: "Please enter a user type",
                    },
                    gender: {
                        required: "Please enter a gender",
                    },
                    // description: {
                    //     required: "Please enter a description",
                    // },
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
