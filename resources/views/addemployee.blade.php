@extends('layouts.main')

@section('content2')

    {{-- add employee form --}}
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="title"> Add employee </h5>
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

                    <div class="card-body">

                        <form method="post" action="{{ url('employees-add') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input type="text" name="first_name" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" name="last_name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>

                                <div class="form-group">
                                    <label for="departments">departments:</label>
                                    <select name="department" class="form-control" >
                                        <option value="">select</option>
                                        @foreach($departments as $department)
                                            <option value="{{$department->id}}">{{$department->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            
                                <div class="form-group">
                                    <label for="designations">designations:</label>
                                    <select name="designations" class="form-control" >
                                        <option value="">select</option>
                                        @foreach($designations as $designation)
                                            <option value="{{$designation->id}}">{{$designation->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                        

                            <div class="form-group">
                                <label for="photo">Photo</label>
                                <input type="file" class=" form-control" style="position: initial;opacity: 1" name="photo">
                            </div>

                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" name="address" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label for="mobile_number">Mobile Number</label>
                                <input type="number" name="mobile_number" class="form-control">
                            </div>
                            
                            <button class="btn btn-primary"> Add </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
      

    @endsection

    

