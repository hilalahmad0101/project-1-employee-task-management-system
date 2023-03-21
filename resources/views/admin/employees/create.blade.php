@extends('admin.layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="app-main__outer">
        <div class="app-main__inner">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-8">
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <h5 class="card-title">Employee Create</h5>
                                <form class="" id="create_emp">
                                    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                                    <div class="position-relative form-group">
                                        <label for="exampleEmail" class="">Name</label>
                                        <input name="name" id="emp_name" placeholder="Enter Your Name" type="text"
                                            class="form-control">
                                    </div>
                                    <div class="position-relative form-group">
                                        <label for="exampleEmail" class="">Email</label>
                                        <input name="email" id="emp_email" placeholder="Enter Your Email" type="email"
                                            class="form-control">
                                    </div>
                                    <div class="position-relative form-group">
                                        <label for="examplePassword" class="">Password</label>
                                        <input name="password" id="password" placeholder="Enter your Password"
                                            type="password" class="form-control">
                                    </div>
                                    <div class="position-relative form-group">
                                        <label for="exampleEmail" class="">Date of Birth</label>
                                        <input name="dob" id="emp_dob" placeholder="Enter Your Date of Birth"
                                            type="text" class="form-control">
                                    </div>

                                    <div class="position-relative form-group">
                                        <label for="exampleEmail" class="">Phone</label>
                                        <input name="phone" id="emp_phone" placeholder="Enter Your Phone" type="text"
                                            class="form-control">
                                    </div>

                                    <div class="position-relative form-group">
                                        <label for="exampleEmail" class="">City</label>
                                        <input name="city" id="emp_city" placeholder="Enter Your City" type="text"
                                            class="form-control">
                                    </div>

                                    <div class="position-relative form-group">
                                        <label for="exampleEmail" class="">Image</label>
                                        <input name="image" id="emp_image" type="file" class="form-control">
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
