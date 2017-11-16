 @extends('admin.layouts.master')

@section('title')
  User History
@endsection

@section('main-content')

   <div class="content-wrapper">
     <div class="after-container">  
        <div class="container-fluid">
              <div class="row">

             <div class="col-md-6">
               <div class="h3" class="text-center" >User Messages Statictis</div>
             </div>
             <div class="col-md-6">
                <div class="col-md-4 col-md-offset-2"> <label for="date">Select Data:</label></div>
                <div class="col-md-4 col-md-offset-2">
                  <select class="form-control" name="year" id="selectYear">
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
  var test = {!! json_encode($userMessageStaticTisMontyly) !!};
   
 
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

 <script>
   $(function(){
      $("#selectYear").change(function(){
          var year = $(this).find(':selected').val();

          $.ajax(function(){
            type:'GET',
            dataType: 'json',   
            url:'/admin/usermessagehistory',
            data:{yearVal: year},
            success:function(response){

              console.log("Data Pass Successfully");
            },

          });

      });
   })
 </script>


@endsection