@extends('layouts.main')

@section('content2')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-header">
                            <h3 class="card-title">Designations</h3>
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
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default2">
                                Add designation
                            </button>
                        </div>

                        {{-- data table --}}
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Designation name</th>
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
                                                <a href="{{ url("delete-designations/$list->id") }}"
                                                    class="btn deletebtn btn-danger">delete</button>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        {{-- Add modal --}}
        <div class="modal fade" id="modal-default2">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add designation</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form method="post" id="quickForm" action="{{ url('add-designationurl') }}">
                            @csrf

                            <div class="form-group">
                                <label for="designation_name">designation Name:</label>
                                <input type="text" name="designation_name" class="form-control">
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

        {{-- edit modal --}}
        <div class="modal fade" id="modal-primary">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit designation</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" id="quickForm2" action="{{ url('edit-designations') }}">
                            @csrf

                            <div class="form-group">
                                <input type="hidden" name="designation_id" id="designation_id">
                                <label for="designation_id">designation Name:</label>
                                <input type="text" id="designation_name" name="designation_name" class="form-control">
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

                    $('#' + form.id).validate({
                        rules: {
                            designation_name: {
                                required: true,
                            },

                        },
                        messages: {
                            designation_name: {
                                required: "Please enter designation name",
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


                //model get data for edit
                $('.edit').click(function() {

                    $('#designation_id').val($(this).attr('data-id'));
                    $('#designation_name').val($(this).attr('data-name'));

                });

                //update
                $('#update-form').click(function() {

                    console.log($('#designation_id').val());
                    console.log($('#designation_name').val());

                });
            });
        </script>
    @endpush
