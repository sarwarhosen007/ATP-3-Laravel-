<!DOCTYPE html>
<html lang="en">
<head>
  <title>@yield('title')</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body style="background: #ecf0f5;">

  
  <div class="container">
    <h2 class="text-center">Login Through Your Secrect Information</h2>
    <div class="row">

         <div class="col-lg-4 col-lg-offset-4">

         @include('error.errors')
         @include('message.warning')
         
            <div class="from-wrapper">


               <form method="POST" action="{{ route('register') }}" >
               {{ csrf_field() }}

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                  <label for="fullName">Full Name:</label>
                  <input type="text" class="form-control" id="fullName" placeholder="Enter Full Name" name="name" value="{{ old('name') }}">

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif

                </div>
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                  <label for="fullName">Full Name:</label>
                  <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" value="{{ old('email') }}">
                  
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif

                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password">Password:</label>
                    <input id="password" type="password" class="form-control" placeholder="Enter Password" name="password">

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif

                </div>

                    <div class="form-group">
                      <label for="confirmPassword">Confirm Password:</label>
                      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Enter Password Again">
                </div>

                <button type="submit" class="btn btn-success">Submit</button>
              </form>
            </div>
            <h4 class="text-center">Already Account?<a href="{{ route('login') }}">Click here to Login</a></h4>
         </div>
    </div>
     
  </div>

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('bootstrap.min.js') }}"></script>

</body>
</html>
 
