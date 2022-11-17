@extends('admin.dashboard.main')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-header">
                @if (session('message'))
                <div class="alert alert-success alert-dismissible fade show">
                <div class="align-items-center">    
                    <button type="button" class="btn-close" data-dismiss="alert"></button>
                    <h6><strong>Success!</strong> {{ session('message') }}</h6>
                </div>
                </div>
                @endif
                <h3>HOD
                    <a href="#" class="btn btn-primary float-end">Add HOD</a>
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped yajra_datatable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
            </div>
        </div>
    </div>
@endsection
@section('jscontent')
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript">
        $(function() {
            var table = $('.yajra_datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.hod') }}",
                columns: [{
                    data: 'id',
                    name: 'id'
                }, {
                    data: 'name',
                    name: 'name'
                }, {
                    data: 'status',
                    name: 'status'
                }, {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }, ]
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>
    <script type="text/javascript">
        $(document).on('click', '.delete', function() {
            var row_id = $(this).attr('id');
            var table_row = $(this).closest('tr');
            var url = "{{ route('admin.hod.delete', ':id') }}";
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'DELETE',
                        url: url.replace(':id', row_id),
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: row_id,
                        },
                        success: function(data) {
                            Swal.fire({
                                title: 'Deleted!',
                                text: 'Your file has been deleted.',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                table_row.remove();
                            });
                        }
                    });
                }
            })
        });
    </script>
@endsection
@section('csscontent')
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection
