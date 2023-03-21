<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>ETMS- Login</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">

    <link href="{{ asset('main.css') }}" rel="stylesheet">
</head>

<body>


    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Admin Login</h5>
                        <form class="">
                            {{-- @csrf --}}

                            <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                            <div class="position-relative form-group">
                                <label for="exampleEmail" class="">Email</label>
                                <input name="email" id="email" placeholder="Enter Your Email" type="email"
                                    class="form-control">
                            </div>
                            <div class="position-relative form-group">
                                <label for="examplePassword" class="">Password</label>
                                <input name="password" id="password" placeholder="Enter your Password"
                                    type="password" class="form-control">
                            </div>
                            <button id="login" class="mt-1 btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="{{ asset('assets/scripts/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/scripts/main.js') }}"></script>
    <script type="text/javascript" src="{{ asset('app.js') }}"></script>
</body>

</html>
