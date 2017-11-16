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


               <form method="POST" action="{{ route('login') }}" >
               {{ csrf_field() }}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  <label for="email">Email:</label>
                  <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter Email Address" required autofocus >
                      @if ($errors->has('email'))
                          <span class="help-block">
                              <strong>{{ $errors->first('email') }}</strong>
                          </span>
                      @endif
                </div>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  <label for="pwd">Password:</label>
                  <input id="password" type="password" class="form-control" placeholder="Enter Password" name="password" required>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
              </form>
            </div>
            <h4 class="text-center">Have no account?<a href="{{ route('register') }}">Create New One</a></h4>
         </div>
    </div>
     
  </div>

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('bootstrap.min.js') }}"></script>

</body>
</html>
 
