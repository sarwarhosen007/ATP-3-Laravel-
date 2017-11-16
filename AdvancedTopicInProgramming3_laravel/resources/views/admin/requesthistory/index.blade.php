@extends('admin.layouts.master')

@section('title')
	Request History
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
        </div>
    </div>
    <!-- /.content -->
  </div>


@endsection