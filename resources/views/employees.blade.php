@extends('layouts.main')

@section('content2')
<meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- employees form --}}
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="title text-center mt-1">employees </h5>
                    </div>
                    <div class="card-body">
                        <form method="post" action="#" style="width: 40%;float: right">
                            @csrf
                            <div class="input-group no-border">
                                {{-- <input type="text" name="search" class="form-control" placeholder="Search...">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <button class="nc-icon nc-zoom-split" style="border: black"></button>
                                    </div>
                                </div> --}}
                            </div>
                        </form>
                        <div class="form-group" style="width: 50%">
                            <a href="{{ url('addemployeeurl') }}"> <button class="btn btn-primary mb-4">Add
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
                                {{-- <th>Password</th> --}}
                                <th>Department</th>
                                <th>Designation</th>
                                <th>Photo</th>
                                <th>Address</th>
                                <th>Mobile Number</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
{{-- 
                            @foreach ($employees as $list)

                                <tr>
                                    <td>{{ $list->id }}</td>
                                    <td>{{ $list->first_name }}</td>
                                    <td>{{ $list->last_name }}</td>
                                    <td>{{ $list->email }}</td>

                                    @foreach ($departments as $department)
                                        @if ($list->departments_id == $department->id)
                                            <td> {{ $department->name }} </td>
                                        @endif
                                    @endforeach
                                    @foreach ($designations as $designation)
                                        @if ($list->designations_id == $designation->id)
                                            <td>{{ $designation->name }} </td>
                                        @endif
                                    @endforeach
                                    @if($list->photo==null)
                                    <td></td>
                                    @else
                                    <td><img src="storage/employee/images/{{ $list->photo }}" height="30" width="30" /></td>
                                    @endif
                                    <td>{{ $list->address }}</td>
                                    <td>{{ $list->mobile_number }}</td>
                                    <td class="text-danger"><a href={{ 'employee-edit/' . $list['id'] }} class="fa fa-edit"></a>
                                    / <a href={{ 'employee-delete/' . $list['id'] }} class="fa fa-trash"></a></td>

                                </tr>
                            @endforeach --}}
                        </table>

                        

                    @endsection
@push('js')
<script type="text/javascript">
         
                              
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url : "{{ route('empdatatable.index')  }}"
        },
        columns: [

            {data: 'id', name: 'id'},
            {data: 'first_name', name: 'first_name'},
            {data: 'last_name', name: 'last_name'},
            {data: 'email', name: 'email'},
            {data: 'department', name: 'department'},
            {data: 'designation', name: 'designation'},
            {data: 'photos', name: 'photos'},
            {data: 'address', name: 'address'},
            {data: 'mobile_number', name: 'mobile_number'},

            {data: 'action', name: 'action', orderable: false, searchable: false},
            // {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    

</script>
@endpush



                    