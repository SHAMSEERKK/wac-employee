@extends('layouts.main')

@section('content2')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- employees form --}}
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="title text-center mt-1">employees Details</h5>
                    </div>
                    <div class="card-body">
                        <form method="post" action="#" style="width: 40%;float: right">
                            @csrf
                            <div class="input-group no-border">
                            </div>
                        </form>
                        <div class="form-group" style="width: 50%">
                            <a href="{{ url('add-employeeurl') }}"> <button class="btn btn-primary mb-4">Add
                                    Employee</button>
                            </a>
                        </div>
                        <table class="table table-striped border data-table">
                            <thead>
                                <tr>

                                    <th>Employee id</th>
                                    <th>First name</th>
                                    <th>Last name </th>
                                    <th>Email</th>
                                    <th>Department</th>
                                    <th>Designation</th>
                                    <th>Photo</th>
                                    <th>Address</th>
                                    <th>Mobile Number</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                        </table>
                    @endsection
                    @push('js')

                        <script type="text/javascript">
                            var table = $('.data-table').DataTable({
                                processing: true,
                                serverSide: true,
                                ajax: {
                                    url: "{{ route('empdatatable.index') }}"
                                },
                                columns: [

                                    {
                                        data: 'id', 
                                        name: 'id'
                                    },
                                    {
                                        data: 'first_name',
                                        name: 'first_name'
                                    },
                                    {
                                        data: 'last_name',
                                        name: 'last_name'
                                    },
                                    {
                                        data: 'email',
                                        name: 'email'
                                    },
                                    {
                                        data: 'department',
                                        name: 'department'
                                    },
                                    {
                                        data: 'designation',
                                        name: 'designation'
                                    },
                                    {
                                        data: 'photos',
                                        name: 'photos'
                                    },
                                    {
                                        data: 'address',
                                        name: 'address'
                                    },
                                    {
                                        data: 'mobile_number',
                                        name: 'mobile_number'
                                    },

                                    {
                                        data: 'action',
                                        name: 'action',
                                        orderable: false,
                                        searchable: false
                                    },

                                ]
                            });
                        </script>
                    @endpush
