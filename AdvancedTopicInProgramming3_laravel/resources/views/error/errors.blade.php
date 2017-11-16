@if(count($errors) > 0)

    @foreach($errors->all() as $error)
       <div class="alert alert-danger alert-dismissable">

       <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

      	<p>{{ $error }}</p>
      </div>
    @endforeach

@endif