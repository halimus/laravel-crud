@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Articles List (Using Datatables)</h2>


            <table class="table table-bordered" id="users-table">
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
<script>
    $(function () {
        $('#users-table00').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('articles2/anyData') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'title', name: 'title'},
                {data: 'body', name: 'body'},
                {data: 'created_at', name: 'created_at'},
                {data: 'updated_at', name: 'updated_at'}
            ]
        });

        $(function () {
            $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ url("articles2/anyData") }}'
            });
        });

    });
</script>
@endpush