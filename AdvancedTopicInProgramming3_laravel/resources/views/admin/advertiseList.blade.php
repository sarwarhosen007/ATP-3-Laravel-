@extends('admin.layouts.master')

@section('title')
	Home
@endsection

@section('main-content')

   <div class="content-wrapper">
     <div class="after-container">  
        <div class="container-fluid">
            <div class="row">
              <div class="col-lg-12">
                  
                  @include('message.success')

                  <div class="panel-group advertise-list">
                    <div class="panel panel-primary">
                      <div class="panel-heading"><b>List of User advertise</b></div>
                      <div class="panel-body">
                         <table class="table">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Department</th>
                                <th>Created At</th>
                                <th>Options</th>
                              </tr>
                            </thead>
                            <tbody>
                            @if(count($advertiseList) > 0)
                              @foreach($advertiseList->all() as $advertise)
                                <tr>
                                  <td>{{ $loop->iteration }}</td>
                                  <td>{{ $advertise->bookTitle }}</td>
                                  <td>{{ $advertise->department }}</td>
                                  <td>{{ $advertise->created_at->diffForHumans() }}</td>
                                  <td>
                                    <a href="{{ route('advertise.individualAdvertise',$advertise->id) }}" class="btn btn-info btn-sm">Details</a>
                                    <a href="{{ route('advertise.delete',$advertise->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                  </td>
                                </tr>
                              @endforeach
                            @else
                                <p>There is no Advertise</p>
                            @endif
                               
                            </tbody>
                          </table>
                           <div class="col-lg-12 text-center">
                               {{ $advertiseList->render() }}
                           </div>
                      </div>
                    </div>
                  </div>
              </div>
               
            </div>
            <div class="row">

             <div class="col-md-6">
               <div class="h3" class="text-center" >Advertise Statictis</div>
             </div>
             <div class="col-md-6">
                <div class="col-md-4 col-md-offset-2"> <label for="date">Select Data:</label></div>
                <div class="col-md-4 col-md-offset-2">
                  <select class="form-control" id="select-year" name="year">
                    <option value="2017">2017</option>
                    <option value="2016">2016</option>
                    <option value="2015">2015</option>
                    <option value="2014">2014</option>
                  </select>
                </div>  
             </div>
              <div class="col-md-12">
                   <div class="example-container clearfix">
                      <div class="example-chart">
                          <div id="bar-chart-example"></div>
                      </div>
                  </div>
              </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
  </div>


@endsection

@section('footer-js')
 
<script>
    $(function(){
        $("#select-year").change(function(){
            var year = $(this).find(':selected').val();
            alert(year);


            $.ajax({
              method: "POST",
              url:'admin/advertiseList',
              data:{'year' : year},
              success:function(data){
                  alert(data.success);
              },
              error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                  
                 console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
              }
            });
        });
      });
</script>

 <script>
   var test = {!! json_encode($advertIseMonth) !!};
   
    
   var exampleBarChartData = {
    "datasets": {
        "values": [test[1], test[2], test[3], test[4], test[5],test[6],test[7],test[8],test[9],test[10],test[11],test[12]],
        "labels": [
            "January", 
            "February", 
            "March", 
            "April", 
            "May",
            "June",
            "July",
            "August",
            "September",
            "October",
            "November",
            "December"
        ], "color": "blue"
    },
    "title": "Example Bar Chart",
    "height": "400px",
    "width": "900px",
    "background": "#FFFFFF",
    "shadowDepth": "1"
};

MaterialCharts.bar("#bar-chart-example", exampleBarChartData)  
 </script>


@endsection