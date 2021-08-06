@extends('layouts.main')

@section('content2')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-header">
                            <h3 class="card-title">Departments</h3>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group mt-3 ml-3" style="width: 50%">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                                Add department
                            </button>
                        </div>
                        {{-- data table --}}
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Department name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lists as $list)

                                        <tr>
                                            <td>{{ $list->id }}</td>
                                            <td>{{ $list->name }}</td>
                                            <td>

                                                <button type="button" class="btn btn-primary edit" data-toggle="modal"
                                                    data-id="{{ $list->id }}" data-name="{{ $list->name }}"
                                                    data-target="#modal-primary">
                                                    edit
                                                </button>
                                                <a href="{{ url("delete-departments/$list->id") }}"
                                                    class="btn deletebtn btn-danger">delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Add modal --}}
        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add department</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form method="post" id="quickForm" action="{{ url('addDepartmenturl') }}">
                            @csrf

                            <div class="form-group">
                                <label for="department_name">department Name:</label>
                                <input type="text" name="department_name" class="form-control">
                            </div>

                            <button class="btn btn-primary submit-btn"> Add </button>
                         
                        </form>
                    </div>
                    <div class="modal-footer justify-content-between">

                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>


        <!-- /.Edit modal -->
        <div class="modal fade" id="modal-primary">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit department</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" id="quickForm2" action="{{ url('edit-departments') }}">
                            @csrf

                            <div class="form-group">
                                <input type="hidden" name="department_id" id="department_id">
                                <label for="department_name">department Name:</label>
                                <input type="text" id="department_name" name="department_name" class="form-control">
                            </div>

                            <button class="btn btn-primary submit-btn" id="update-form"> update</button>
                        </form>
                    </div>
                    <div class="modal-footer justify-content-between">
             
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

    @endsection
    @push('script')
        <script>
            $("#example2").DataTable();

            //  jquery validation
            $(function() {

                $('.submit-btn').click(function() {
                    let form = $(this).closest('form')[0]
                    $('#'+form.id).validate({
                        rules: {
                            department_name: {
                                required: true,
                            },

                        },
                        messages: {
                            department_name: {
                                required: "Please enter department name",
                            }
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
                })



                $('.edit').click(function() {
           
                    $('#department_id').val($(this).attr('data-id'));
                    $('#department_name').val($(this).attr('data-name'));

                });


                $('#update-form').click(function() {
             
                    console.log($('#department_id').val());
                    console.log($('#department_name').val());
        
                });



            });
        </script>

    @endpush
