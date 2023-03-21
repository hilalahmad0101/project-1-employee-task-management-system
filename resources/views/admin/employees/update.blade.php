@extends('admin.layouts.app')

@section('title')
    Update Employee
@endsection

@section('content')
    <div class="app-main__outer">
        <div class="app-main__inner">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-8">
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <h5 class="card-title">Employee Update</h5>
                                <form class="" id="update_emp">
                                    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                                    <div class="position-relative form-group">
                                        <label for="exampleEmail" class="">Name</label>
                                        <input name="name" value="{{ $employee->name }}" id="emp_name" placeholder="Enter Your Name" type="text"
                                            class="form-control">
                                            <input name="id" value="{{ $employee->id }}" id="id" placeholder="Enter Your Name" type="hidden"
                                            class="form-control">
                                    </div>
                                    <div class="position-relative form-group">
                                        <label for="exampleEmail" class="">Email</label>
                                        <input name="email" value="{{ $employee->email }}" id="emp_email" placeholder="Enter Your Email" type="email"
                                            class="form-control">
                                    </div>
                                    <div class="position-relative form-group">
                                        <label for="exampleEmail" class="">Date of Birth</label>
                                        <input name="dob" value="{{ $employee->dob }}" id="emp_dob" placeholder="Enter Your Date of Birth"
                                            type="text" class="form-control">
                                    </div>

                                    <div class="position-relative form-group">
                                        <label for="exampleEmail" class="">Phone</label>
                                        <input name="phone" value="{{ $employee->phone }}" id="emp_phone" placeholder="Enter Your Phone" type="text"
                                            class="form-control">
                                    </div>

                                    <div class="position-relative form-group">
                                        <label for="exampleEmail" class="">City</label>
                                        <input name="city" value="{{ $employee->city }}" id="emp_city" placeholder="Enter Your City" type="text"
                                            class="form-control">
                                    </div>

                                    <div class="position-relative form-group">
                                        <label for="exampleEmail" class="">Image</label>
                                        <input name="image" id="emp_image" type="file" class="form-control">
                                        <img src="{{ asset('storage') }}/{{  $employee->image }}" width="60" alt="">
                                        <input name="old_image" id="emp_image" type="hidden"  value="{{  $employee->image }}" class="form-control">
                                    </div>
                                    <button type="submit" class="mt-1 btn btn-primary">Create</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script>
   $("#update_emp").submit( function (e) {
        e.preventDefault();
        const formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: '{{ route("admin.employee.update") }}',
            data: formData,
            dataType:'json',
            contentType: false,
            processData: false,
            success: (data) => {
                if(data.success==true){
                    alert(data.message)
                }else{
                    alert(data.message)
                }
            }
        })

    })
       
    </script>
@endsection