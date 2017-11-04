

@if(Session::has('message'))
	<div class="alert alert-info alert-dismissable">
	    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
		<p>{{ Session::get('message') }}</p>
	</div>
@endif