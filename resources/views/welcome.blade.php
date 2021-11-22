<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Unit Hemodialisis</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


    <!-- Styles -->
    <style>
        html, body {
            background-color: #113f67 ;
            color: #e4eddb;
            font-family: 'Geneva', sans-serif;
            font-weight: 300;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 60px;
        }

        .links > a {
            color: #fff;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
             Welcome
             <p><b>Hemodialysis Monitoring Information System</p></b>
         </div>
         <div class="container">
            @if (Route::has('login'))
            <div class="links">
                @auth
                @if(Auth::user()->role=='patient')
                <a href="{{ route('machines.patient') }}">Home</a>
                    @else
                    <a href="{{ url('/home') }}">Home</a>
                    @endif

                    @else
                    {{-- <a href="{{ route('login') }}">Login</a> --}}
                    <a class="btn btn-success btn-block" type="submit" href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                    {{-- <a href="{{ route('register') }}">Register</a> --}}
                    <a type="submit" class="btn btn-success btn-block" href="{{ route('register') }}">Register</a>
                    @endif
                    @endauth
                </div>
                @endif

            </div>
        </div>
    </div>
</body>
</html>
