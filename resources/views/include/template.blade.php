<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Mini CRM</title>
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
        .topnav {
            background-color: #333;
            overflow: hidden;
        }

        .topnav .nav-link {
            float: right;
            color: #f2f2f2;
            text-align: center;
            padding: 15px 16px;
            text-decoration: none;
            font-size: 20px;
        }

        .topnav .nav-text {
            float: left;
            color: #f2f2f2;
            text-align: center;
            padding: 15px 16px;
            text-decoration: none;
            font-size: 20px;
        }

        .topnav .nav-link:hover {
            background-color: #4e4e4e;
            color: #f2f2f2;
            border-bottom: 3px solid #7cc0ff;
        }

        .topnav a.active {
            color: #7cc0ff;
            border-bottom: 3px solid #7cc0ff;
        }
        .form-group label{
            margin-block: 5px;
            font-weight: bold;
        }

    </style>

    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

</head>

<body>
    <div class="topnav">
        <a class="nav-text" href="{{ url('/home') }}">Mini CRM</a>
        <a class="nav-link logout" href="{{ url('/logout') }}">
            <i class="fa-solid fa-right-from-bracket"></i> Logout</a>
        <a class="nav-link {{ @$company_active }}" href="{{ url('/company') }}">
            <i class="fa-solid fa-building"></i> Company</a>
        <a class="nav-link {{ @$employee_active }}" href="{{ url('/employee') }}">
            <i class="fa-solid fa-users"></i> Employee</a>
        <a class="nav-link {{ @$home_active }}" href="{{ url('/home') }}">
            <i class="fa-solid fa-house-user"></i> Home</a>
    </div>
    <div class="container" style="margin-top: 30px;">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">

                @yield('content')

            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</body>
<script>
    $('.logout').on('click', function() {
        if (!confirm('Are you Sure?')) {
            event.preventDefault();
        }
    });
</script>

</html>
