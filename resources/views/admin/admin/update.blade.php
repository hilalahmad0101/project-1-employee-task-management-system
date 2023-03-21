@extends('admin.layouts.app')

@section('title')
    Admin
@endsection

@section('content')
    <div class="app-main__outer">
        <div class="app-main__inner">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-8">
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <h5 class="card-title">Admin Update</h5>
                                <form class="" id="update_admin">
                                    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                                    <div class="position-relative form-group">
                                        <label for="exampleEmail" class="">Name</label>
                                        <input name="name" id="admin_name" value="{{ $admin->name }}" placeholder="Enter Admin Name" type="text"
                                            class="form-control">

                                            <input name="id" id="id" value="{{ $admin->id }}" placeholder="Enter Admin Name" type="hidden"
                                            class="form-control">
                                    </div>

                                    <div class="position-relative form-group">
                                        <label for="exampleEmail" class="">Email</label>
                                        <input name="email" id="admin_email" value="{{ $admin->email }}" placeholder="Enter Admin Email" type="email"
                                            class="form-control">
                                    </div>

                                    <div class="position-relative form-group">
                                        <label for="exampleEmail" class="">Phone</label>
                                        <input name="phone" id="admin_phone" value="{{ $admin->phone }}" placeholder="Enter Admin phone" type="text"
                                            class="form-control">
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
   $("#update_admin").submit( function (e) {
        e.preventDefault();
        const formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: '{{ route("admin.admin.update") }}',
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
