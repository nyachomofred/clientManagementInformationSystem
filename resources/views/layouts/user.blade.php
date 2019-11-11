<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Client Management | Information Syystem</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        
    <!-- Bootstrap 3.3.7 -->
    <link media="all" type="text/css" rel="stylesheet" href="{{asset('resources/assets/css/bootstrap.min.css')}}">

    <!-- Theme style -->
    <link media="all" type="text/css" rel="stylesheet" href="{{asset('resources/assets/css/AdminLTE.min.css')}}">

    <style type="text/css">
        .login-box, .register-box {
            width: 720px;
            margin: 6% auto;
        }

        .login-left {
            border-right: 4px solid #ddd;
        }

        @media (max-width: 470px) {
            .login-box, .register-box {
                width: 340px;
            }

            .login-left {
                border-right: none;
            }
        }

        .or-separator {
            text-align: center;
            margin: 10px 0;
            text-transform: uppercase;
        }

        .or-separator:after, .or-separator:before {
            content: ' -- ';
        }


    </style>
 </head>   
<body class="hold-transition login-page no-block-ui">

          <!-- Main content -->
          <div class="login-box">
           <!-- /.login-logo -->
          <div class="login-box-body">
    <main class="py-4">
      @yield('content')
    </main>




    <!-- jQuery 3 -->
<script src="{{asset('resources/assets/js/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('resources/assets/js/bootstrap.min.js')}}"></script>

</body>