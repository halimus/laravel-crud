@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Articles List (Using Datatables)</h2>


            <table class="table table-bordered" id="datatable">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Article Title</th>
                        <th>Article Body</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                       
                    </tr>
                </thead>
            </table>


        </div>
    </div>
</div>
@endsection


@push('scripts')
<!-- DataTables -->
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script>
    $(function () {
        $(function () {
            $('#datatable0').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ url("datatable/ajaxdata") }}'
            });
        });
        
        $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ url("datatable/ajaxdata") }}',
            columns: [
                {data: 0, name: 'id'},
                {data: 1, name: 'title'},
                {data: 2, name: 'body', searchable: false},
                {data: 3, name: 'created_at'},
                {data: 4, name: 'updated_at'}
            ]
        });
        
    });
</script>
@endpush