@extends('layouts.main')
@section('content2')

    {{-- modal --}}
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit department</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    
                    <form method="post" id="quickForm" action="{{ url('addDepartmenturl') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">

                            <div class="form-group">
                                <label for="department_name">department Name:</label>
                                <input type="text" name="department_name" class="form-control">
                            </div>

                            <button class="btn btn-primary">save change</button>
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    {{-- edit model --}}
    {{-- modal --}}
    <div class="modal fade" id="modal-default-edit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit department</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form method="post" id="quickForm" action="{{ url('addDepartmenturl') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">

                            <div class="form-group">
                                <label for="department_name">department Name:</label>
                                <input type="text" name="department_name" class="form-control">
                            </div>

                            <button class="btn btn-primary">save change</button>
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endsection
