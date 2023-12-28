@extends('adminlte::page')
@section('title', 'Cms::Testimonial')


@push('css')
    <link rel="stylesheet" href="{{ asset('vendor/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush

@section('css')
<style>
    /* Styles for the avatar */
    .avatar {
        width: 30px;
        height: 30px;
        background-color: #575757;
        color: #fff;
        text-align: center;
        line-height: 30px;
        font-size: 18px;
        border-radius: 50%;
    }
</style>
@stop

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Testimonial::List</h1>
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
                        <a type="button" href="{{ route('admin.testimonial.create') }}" class="btn btn-sm btn-primary">Add New Testimonial</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-default-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <p>{{ session('status') }}</p>
                            </div>
                        @endif
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Image </th>
                                    <th>Quote </th>
                                    <th>Quotes_given_by</th>
                                    <th>Quotes_given_by_profession</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($testimonials as $testimonial)
                                    <tr>
                                        <td>
                                            @if (isset($testimonial->image) != '' && $testimonial->image)
                                                <img src="{{ url( 'storage/' . $testimonial->image) }}" class="rounded-circle" style="width: 30px;" />
                                            @else
                                                <div class="avatar"></div>
                                            @endif
                                        </td>
                                        <td>{{ $testimonial->quote }}</td>
                                        <td class="name-of-avatar">{{ $testimonial->quotes_given_by }}</td>
                                        <td>{{ $testimonial->quotes_given_by_profession }}</td>
                                        <td>
                                            <a type="button" href="{{ route('admin.testimonial.edit', $testimonial->id) }}"
                                                class="btn btn-sm btn-primary">Edit</a>
                                            <a onclick="return confirm('Are you sure to delete')" type="button" href="{{ route('admin.testimonial.delete', $testimonial->id) }}"
                                                class="btn btn-sm btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                               
                            </tfoot>
                        </table>
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
    <script src="{{ asset('vendor/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('vendor/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('vendor/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('vendor/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('vendor/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('vendor/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('vendor/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('vendor/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
@endpush

@section('js')
    <script>
        $(function() {
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });

            $('.name-of-avatar').each(function(){
                var text = $(this).text();
                var initials = text.match(/\b\w/g) || [];
                initials = ((initials.shift() || '') + (initials.pop() || '')).toUpperCase();
                console.log(initials)
                $(this).siblings().eq(0).find('.avatar').text(initials);
            })
        });
    </script>
@stop
