@extends('layouts.main')

@section('content2')

    {{-- edit employee form --}}
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="title"> edit employee </h5>
                    </div>
                    {{-- @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif --}}

                    <div class="card-body">

                        <form method="post" action="{{ url('employee-update') }}" enctype="multipart/form-data"
                            id="Editform">
                            @csrf
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input type="text" name="first_name" class="form-control"
                                    value="{{ $employee['first_name'] }}">
                            </div>


                            <div class="form-group">
                                <input type="hidden" name="id" class="form-control" value="{{ $employee['id'] }}">
                            </div>

                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" name="last_name" class="form-control"
                                    value="{{ $employee['last_name'] }}">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ $employee['email'] }}">
                            </div>

                            <div class="form-group">
                                <label for="departments">Department</label>
                                <select name="department" class="form-control">
                                    <option value="">select</option>
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}"
                                            {{ $department->id == $employee['departments_id'] ? 'selected' : '' }}>
                                            {{ $department->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="designations">Designation</label>
                                <select name="designations" class="form-control">
                                    <option value="">select</option>
                                    @foreach ($designations as $designation)
                                        <option value="{{ $designation->id }}"
                                            {{ $designation->id == $employee['designations_id'] ? 'selected' : '' }}>
                                            {{ $designation->name }}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="photo">Photo</label>
                                <input type="file" class=" form-control" style="position: initial;opacity: 1"
                                    name="photo" />
                                @if (!empty($employee->photo))
                                    <img src="../storage/employee/images/{{ $employee['photo'] }}" height="50"
                                        width="50" />
                                @else

                                    <img src="../storage/employee/images/default/default_img.png" height='50px'
                                        width='50px'>
                                @endif

                            </div>

                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea name="address" class="form-control">{{ $employee['address'] }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="mobile_number">Mobile Number</label>
                                <input type="" name="mobile_number" class="form-control"
                                    value="{{ $employee['mobile_number'] }}">
                            </div>

                            <button class="btn btn-primary"> save change </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    {{-- jquery validation --}}
    @push('script')

        <script>
            $(document).ready(function() {
                $('#Editform').validate({
                    rules: {
                        first_name: {
                            required: true,
                            maxlength: 100,
                        },
                        last_name: {
                            required: true,
                            maxlength: 100,
                        },
                        email: "required",
                        department: "required",
                        designations: "required",
                        address: {
                            maxlength: 150,
                        },
                        mobile_number: {
                            required: true,
                            digits: true,
                            minlength: 8,
                            maxlength: 16,
                        }

                    },
                    messages: {
                        first_name: "First name is required",
                        last_name: "Last name is required",
                        email: "Email is required",
                        department: "department is required",
                        designations: "designation is required",

                        address: "maximum 150 words",
                        mobile_number: {
                            required: 'mobile number is required',
                            digits: "mobile number enter in digits",
                            minlength: "mobile number mustly minimum 8 digits",
                            maxlength: "mobile number maximum only 16 digits",
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
            });
        </script>
    @endpush
