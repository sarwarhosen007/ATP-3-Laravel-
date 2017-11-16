<!DOCTYPE html>

<html>

   @include('admin.layouts.head')

<body class="hold-transition skin-blue sidebar-mini">

	<div class="wrapper">
	
	   @include('admin.layouts.header')

	   @include('admin.layouts.sidebar')	
    
           @yield('main-content')

	</div>

	@include('admin.layouts.footer')

</body>
</html>