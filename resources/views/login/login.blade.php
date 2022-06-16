<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Login | Mini CRM</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="" type="image/x-icon" />

    <link rel="stylesheet" href="{{ asset('/admin/css/style.css') }}">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        .form-group label {
            margin-block: 5px;
            font-weight: bold;
        }

    </style>
</head>

<body class="login p-5">

    <form action="{{ url('/login') }}" method="post" encType="multipart/form-data"
        class="d-flex justify-content-center">
        {!! csrf_field() !!}
        <div class="card m-5" style="width: 400px;">
            <div class="card-header p-3">
                <h4 class="text-center">Login to your account</h4>
            </div>
            <div class="card-body p-5">
                <div class="row">
                    @if (Session::has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong>{{ Session::get('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                    @if (isset($errors) && count($errors) > 0)
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="col-sm-12 m-2">
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="text" class="form-control" name="email" placeholder="Enter Email" required>
                        </div>
                    </div>
                    <div class="col-sm-12 m-2">
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password"
                                required>
                        </div>
                    </div>
                </div>
                <div class="mt-4 d-flex  justify-content-center">
                    <button type="submit" class="btn btn-primary" style="width: 180px">Login</button>
                </div>
            </div>
        </div>
    </form>

    @if (Session::has('error'))
        <script>
            tfna_alert_danger('Error', '{{ Session::get('error') }}');
        </script>
    @endif

</body>

</html>
