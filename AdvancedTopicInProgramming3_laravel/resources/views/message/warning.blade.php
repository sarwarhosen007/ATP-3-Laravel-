

@if(Session::has('WarningMessage'))
	<div class="alert alert-danger alert-dismissable">
	    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
		<p>{{ Session::get('WarningMessage') }}</p>
	</div>
@endif