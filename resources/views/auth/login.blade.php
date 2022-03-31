<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--Bootstrap-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/f67ab1f0a2.js" crossorigin="anonymous"></script>
        
        <!--CSS-->
        <style>
            body{
                overflow-x: hidden;
            }
            .btn-login{
                background-color: #212429;
                color: white;
                transition: ease-in-out 0.15s;
            }
            .btn-login:hover{
                background-color: #A72A2C;
                color: white;
            }
            .login-label{
                font-weight: bold;
                color: #A72A2C;
                font-style: italic;
            }
        </style>
        
        <title>CodeJuan | Login</title>

    </head>

    <body>

        <div class="row h-100 100vh">

            <div class="col-lg-4 pl-5 pr-4 h-100">

                <div class="w-100 text-center py-lg-5 px-lg-3">
                    <img src="/images/logobrand.png" width="80%" height="auto" class="mb-5">
                    <h5>Practice Awareness. Identify Risks. Beat the Threats.</h5>
                </div>


                @if(Session::has('flash_error'))
                <div class="alert alert-danger">{{Session::get('flash_error')}}</div>
                @endif

                <div class="px-2">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}	
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">				
                            <label class="login-label">Email Address:</label>
                            <input type="email" name="email" class="form-control" placeholder="Email Address">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif                        
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">				
                            <label class="login-label">Enter Password:</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter Password">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif                        
                        </div>
                        <br/>
                        <div class="text-center">
                            <button type="submit" class="btn btn-login form-control">Login</button>
                        </div>
                    <br/>
                    </form>
                </div>


            </div>
            <div class="col-lg-8 p-0 h-100 ">
                <img src="/images/LoginPage_Img.png" style="object-fit:cover;width:100%;height:100vh">
            </div>

        </div>


    </body>
</html>