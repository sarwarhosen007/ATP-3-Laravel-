@extends('admin.layouts.master')

@section('title')
	User History
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
                      <div class="panel-heading"><b>List of User</b></div>
                      <div class="panel-body">
                         <table class="table">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Registration Date</th>
                                <th>Options</th>
                              </tr>
                            </thead>
                            <tbody>
                            @if(count($usersLists) > 0)
                              @foreach($usersLists->all() as $usersList)
                                <tr>
                                  <td>{{ $loop->iteration }}</td>
                                  <td>{{ $usersList->name }}</td>
                                  <td>{{ $usersList->email }}</td>
                                  <td>{{ $usersList->created_at->diffForHumans() }}</td>
                                  <td>
                                    <a href="{{ route('userhistory.individualUser',$usersList->id) }}" class="btn btn-info btn-sm">Details</a>
                                  </td>
                                </tr>
                              @endforeach
                            @else
                                <p>There is no Users</p>
                            @endif
                               
                            </tbody>
                          </table>
                           <div class="col-lg-12 text-center">
                               {{ $usersLists->render() }}
                           </div>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
             <div class="row">

             <div class="col-md-6">
               <div class="h3" class="text-center" >User Registration Statictis</div>
             </div>
             <div class="col-md-6">
                <div class="col-md-4 col-md-offset-2"> <label for="date">Select Data:</label></div>
                <div class="col-md-4 col-md-offset-2">
                  <select class="form-control" name="year">
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
  var test = {!! json_encode($userStaticTisMontyly) !!};
   
 
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