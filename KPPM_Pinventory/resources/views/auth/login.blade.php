<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{url('fonts')}}/icomoon/style.css">

    <link rel="stylesheet" href="{{url('css')}}/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{url('css')}}/bootstrap/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="{{url('css')}}/login.css">

    <title>Sign In</title>
    <link rel="shortcut icon" href="{{url('images')}}/cardboardbox.png" />
</head>

<body>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6 order-md-2">
                    <img src="images/inventory.png" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="mb-4">
                                <h3>Sign In</h3>
                                <img src="{{url('images')}}/pinventory-logo-nobg(1).png" alt="..." width="300" height="60">
                            </div>
                            <form action="{{route('login')}}" method="post">
                                @csrf
                                @method('post')

                                <div class="form-group first">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" name="email" id="username">

                                </div>
                                <div class="form-group last mb-4">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" id="password">

                                </div>

                                <input type="submit" value="Log In" class="btn text-white btn-block btn-primary btn-info">
                                <div class="signup_link">
                                    Not a member? <a href="{{route('register')}}">Sign up</a>
                                </div>

                                <div class="signup_link">
                                    <a href="{{route('forget.password.get')}}">Reset Password</a>
                                </div>
                                
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>


    <script src="{{url('vendors')}}/jquery/jquery-3.4.1.min.js"></script>
    <script src="{{url('vendors')}}/popper.min.js"></script>
    <script src="{{url('vendors')}}/bootstrap/bootstrap.min.js"></script>
    <script src="{{url('js')}}/login.js"></script>
</body>

</html>
