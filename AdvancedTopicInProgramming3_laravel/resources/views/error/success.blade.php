 
@if(Session::has('message'))

	<div class="alert alert-success alert-dismissable">

	   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

		<p>{{  Session()->get('message') }}</p>

	</div>

@endif    