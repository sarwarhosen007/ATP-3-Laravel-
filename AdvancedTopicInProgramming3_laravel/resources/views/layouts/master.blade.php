<!DOCTYPE html>

<html>

   @include('layouts.head')

<body class="hold-transition skin-blue sidebar-mini">

	<div class="wrapper">
	
	   @include('layouts.header')

	   @include('layouts.sidebar')	
    
           @yield('main-content')


	</div>

	@include('layouts.footer')

</body>
</html>