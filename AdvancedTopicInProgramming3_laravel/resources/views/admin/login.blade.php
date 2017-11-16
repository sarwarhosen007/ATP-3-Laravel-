<!DOCTYPE html>
<html lang="en">
<head>
  <title>@yield('title')</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body style="background: #ecf0f5;">

  
  <div class="container">
    <h2 class="text-center">Login Through Your Sectect Information</h2>
    <div class="row">

         <div class="col-lg-4 col-lg-offset-4">

         @include('error.errors')
         @include('message.warning')
         
         
            <div class="from-wrapper">
               <form action="{{ route('login.check') }}" method="post" >
               {{ csrf_field() }}
                <div class="form-group">
                  <label for="email">Email:</label>
                  <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="{{ old('email') }}">
                </div>
                <div class="form-group">
                  <label for="pwd">Password:</label>
                  <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
              </form>
            </div>
         </div>
    </div>
     
  </div>

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('bootstrap.min.js') }}"></script>

</body>
</html>
 
