<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}" type="text/css">
    <style>
        body{
            height: 100%;
            background: #f2f2f2;
        }
        .needs-validation{
            width: 100%;
            max-width: 330px;
            margin: auto;
        }
        .card{
        	margin-top: 4%;
        	background: #f1f1f1;
        	box-shadow: 10px 0 10px 10px;
            min-height: 80vh;  
        }
        h2{
            color: #7fad39;
            font-family: Poppins-Bold;
            font-size: 30px;
            font-weight: 700;
            line-height: 1.2;
            font-weight: bold;
            padding-top: 4px;
        }
        input[type = "email"],input[type = "password"],input[type = "text"]{
        	border: 0;
        	display: block;
        	padding: 14px 10px;
        	background: none;
            border-bottom: 1px solid #7fad39;
        	color: #7fad39;
            width: 100%;
        }
        input[type = "email"]:focus,input[type = "password"]:focus,input[type = "text"]:focus{
          outline: none;
        }
        .spacer-20{
            border: 1px solid #7fad39;
            background-color: #ededed;
            padding: 10px;
            color: #7fad39;
            border-radius: 20px;
            width: 120px;
            margin-left: 35%;
            font-size: 20px;
            line-height: 1.2;
            letter-spacing: 1px;
        }
    </style>
</head>
<body>
    <div class="container" style="height: 85vh;">
         @if(session('error'))
            <div class="alert alert-danger" role="alert">
                {!! session('error') !!}
            </div>
        @endif
        <div class="row">
            <div class="col-md-4 col-3"></div>
            <div class="col-md-4 col-6 re card d-none">
                <div class="spacer-40"></div>
                <h2 class="text-center my-3">Register For New User</h2>
                <div class="spacer-20 text-center">Welcome</div>
                <form method="post" action="{{ url('/store/register') }}" class="needs-validation" id="login_form" >
                    {{ csrf_field() }}
                   
                    <div class="form-group">
                        <input type="email" placeholder="Email" autocomplete="off"  id="email" name="email">
                    </div>

                     <div class="form-group">
                        <input type="text"  id="name" name="name" placeholder="Name" autocomplete="off">
                    </div>
             
                    <div class="form-group">
                        <input type="password"  id="password" placeholder="Password" name="password" autocomplete="off">
                    </div>
                    
                    <div class="form-group">
                        <input type="password"  id="password" placeholder="Re-password" name="re-password">
                    </div>
                    
                    <div class="form-group">
                        <input type="text"  id="password" placeholder="Address" name="address">
                    </div>

                    <div class="form-group">
                        <input type="text"  id="password" placeholder="Phone" name="phone">
                    </div>


                    <div class="form-group text-center mt-2">
                        <button style="cursor:pointer;border-radius: 25px;background-color: #7fad39;padding: 4px 20px" type="submit" class="btn btn-primary">Enter</button>
                         <p class="mt-3 login" style="text-decoration: outline;cursor: pointer;font-weight: 900;">Login Here!</p>
                    </div>
                </form>
            </div>
            <div class="col-md-4 col-6 card log">
                <div class="spacer-40"></div>
                <h2 class="text-center mt-5">Login</h2>
                <div class="spacer-20 text-center my-3">Welcome </div>
                <form method="post" action="{{ url('/store/login') }}" class="needs-validation" id="login_form" >
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="email"  id="email" name="email" autocomplete="off" placeholder="Email">
                    </div>
             
                    <div class="form-group">
                        <input type="password"  id="password" name="password" autocomplete="off" placeholder="Password">
                    </div>

                    <div class="form-group text-center mt-5">
                        <button style="cursor:pointer;border-radius: 25px;background-color: #7fad39;padding: 4px 20px;" type="submit" class="btn btn-primary">Login</button>
                        <p class="mt-5 register" style="text-decoration: outline;cursor: pointer;font-weight: 700;">Don’t have an account? Sign Up</p>
                    </div>
                </form>
            </div>
            <div class="col-md-4 col-3"></div>
        </div>
 </div>
 <script>
     $('.register').click(function(){
        $('.re').removeClass('d-none');
        $('.log').addClass('d-none');
     })
     $('.login').click(function(){
        $('.re').addClass('d-none');
        $('.log').removeClass('d-none');
     })
 </script>
</body>
</html>
 