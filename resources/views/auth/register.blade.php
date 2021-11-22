<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>InfyOm Laravel Generator | Registration Page</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/css/AdminLTE.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/css/skins/_all-skins.min.css">

    <!-- iCheck -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/square/_all.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<style>
    html, body {
        background-color: #113f67;
        color: #e7eaf6;
        /*font-family: 'Nunito', sans-serif;*/
        /*font-weight: 200;*/
        height: 100vh;
        margin: 0;

    }
    .register-box {
        width: 720px;
        margin: 0% auto;
    }
</style>
</head>

<body class="hold-transition register-page">
    <div class="container" style="background-color:#113f67">
        <div class="row justify-content-center">
            <br>
        </div>       
        <div class="row justify-content-center">
            <div class="col-md-2 ">
                {{-- <div class="btn-group" role="group"> --}}
                    <a class="btn btn-success btn-block" role="button" type="submit" href="{{ url('/') }}">Home</a>
                {{-- </div> --}}
            </div>
            <div class="col-md-2 ">
                {{-- <div class="btn-group" role="group"> --}}
                    <a class="btn btn-success btn-block" role="button" type="submit" href="{{ route('login') }}">Login</a>
                {{-- </div> --}}
            </div>
        </div>
    </div>
    <div class="register-box">
        <div class="register-logo">
            <p style="font-size: 25px; color: #113f67;">
                <b>Being Smart Safe And Responsible User</b>
            </p>
        </div>

        <div class="register-box-body">
            <p class="login-box-msg">Register a new user</p>

            <form method="post" action="{{ url('/register') }}">

                {!! csrf_field() !!}

                {{-- -------------------------------------------------------------------- --}}
                <div class="form-group has-feedback{{ $errors->has('role') ? ' has-error' : '' }}">
                    {{-- <input type="select" class="form-control" role="role" value="{{ old('role') }}" placeholder="Role"> --}}
                    {!! Form::select('role', array('medis'=>'Medis','paramedis'=>'Paramedis','patient'=>'Patient'),'',['class'=> 'form-control']) !!}
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>

                    @if ($errors->has('role'))
                    <span class="help-block">
                        <strong>{{ $errors->first('role') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group has-feedback{{ $errors->has('ktp') ? ' has-error' : '' }}">
                    <input type="text" class="form-control" name="ktp" value="{{ old('ktp') }}" placeholder="KTP">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>

                    @if ($errors->has('ktp'))
                    <span class="help-block">
                        <strong>{{ $errors->first('ktp') }}</strong>
                    </span>
                    @endif
                </div>
                {{-- ------------------------------------------------------------------ --}}


                <div class="form-group has-feedback{{ $errors->has('name') ? ' has-error' : '' }}">
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Full Name">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>

                    @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

                    @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                    @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group has-feedback{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                    @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox"> I agree to the <a href="#">terms</a>
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <a href="{{ url('/login') }}" class="text-center">I already have a membership</a>
        </div>
        <!-- /.form-box -->
    </div>
    <!-- /.register-box -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- AdminLTE App -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/js/adminlte.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>

    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
        });
    </script>
</body>
</html>
