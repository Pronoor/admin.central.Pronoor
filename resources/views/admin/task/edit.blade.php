@extends('adminlte::page')
@section('title', 'Cms::Tasks')


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
                <h1>Task::Create</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Task</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
@stop

@section('content')
    <section class="content">
        <form action="{{ route('admin.tasks.update', $tasks->id) }}" method="post" id="quickForm">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <a type="button" href="{{ route('admin.tasks') }}" class="btn btn-sm btn-primary">Back</a>
                        </div>
                    </div>
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
                </div>
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Tasks details</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <label for="name">Task Name</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    placeholder="Enter name" value="{{ $tasks->name }}">
                            </div>
                            <div class="form-group">
                                <label for="description">Task Description</label>
                                <textarea id="description" name="description">
                                    {{ $tasks->description }}
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select id="status" name="status" class="form-control">
                                    @if ($tasks->status == 'To Do')
                                        <option value="To Do">To Do</option>
                                        <option value="On Hold">On Hold</option>
                                        <option value="Canceled">Canceled</option>
                                        <option value="Success">Success</option>
                                    @endif
                                    @if ($tasks->status == 'On Hold')
                                        <option value="On Hold">On Hold</option>
                                        <option value="To Do">To Do</option>
                                        <option value="Canceled">Canceled</option>
                                        <option value="Success">Success</option>
                                    @endif
                                    @if ($tasks->status == 'Canceled')
                                        <option value="Canceled">Canceled</option>
                                        <option value="To Do">To Do</option>
                                        <option value="On Hold">On Hold</option>
                                        <option value="Success">Success</option>
                                    @endif
                                    @if ($tasks->status == 'Success')
                                        <option value="Success">Success</option>
                                        <option value="To Do">To Do</option>
                                        <option value="On Hold">On Hold</option>
                                        <option value="Canceled">Canceled</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-6">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Assignee Estimation</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="assignee">Assignee</label>
                                <select id="assignee" name="assignee" class="form-control">
                                    @foreach ($users as $user)
                                        <option {{ ($user->id == $tasks->assignee) ? "selected":"" }}
                                            value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="deadline">Deadline</label>
                                <input type="date" name="deadline" id="deadline" class="form-control"
                                    value="{{ $tasks->deadline }}">
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
        </form>
        </div>
        <br><br>

    </section>
@stop

@push('js')
    <script src="{{ asset('vendor/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('vendor/plugins/summernote/summernote-bs4.min.js') }}"></script>
@endpush

@section('js')
    <script>
        $('#description').summernote({
            'height': '200px'
        })
        $(function() {
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
                    description: {
                        required: true,
                    },
                    status: {
                        required: true
                    },
                    assignee: {
                        required: true
                    },
                    deadline: {
                        required: true
                    },
                },
                messages: {
                    name: {
                        required: "Please enter a name",
                    },
                    description: {
                        required: "Please enter a description",
                    },
                    status: {
                        required: "Please enter a status",
                    },
                    assignee: {
                        required: "Please enter a assignee",
                    },
                    deadline: {
                        required: "Please enter a deadline",
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
