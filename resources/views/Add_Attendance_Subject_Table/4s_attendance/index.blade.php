@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                  <div class=>
                      
                      <a href="{{ url('/home') }}" title="Go back to main menu"><button class="btn btn-warning "><i class="fa fa-arrow-left" aria-hidden="true"></i>Admin Menu  </button></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <a href="{{ url('/1g_attendance') }}" title="EditData"><button class="btn btn-primary "><i class="fa fa-arrow-left" aria-hidden="true"></i>General CS attendance table </button></a>
                     <a href="{{ url('/1s_attendance') }}" title="EditData"><button class="btn btn-danger"><i class="fa fa-arrow-left" aria-hidden="true"></i>Direct CS  attendance table</button></a>
                     
                      <br><br>
                      
                     <a href="{{ url('/1s_attendance') }}" title="EditData"><button class="btn btn-success "><i class="fa fa-arrow-left" aria-hidden="true"></i>{{$level->level}} </button></a>
                     <a href="{{ url('/2s_attendance') }}" title="EditData"><button class="btn btn-success"><i class="fa fa-arrow-left" aria-hidden="true"></i>{{$level1->level}} </button></a>
                      <a href="{{ url('/3s_attendance') }}" title="EditData"><button class="btn btn-success "><i class="fa fa-arrow-left" aria-hidden="true"></i>{{$level2->level}} </button></a>
                     <a href="{{ url('/4s_attendance') }}" title="EditData"><button class="btn btn-danger "><i class="fa fa-arrow-left" aria-hidden="true"></i>{{$level3->level}} </button></a>
                     
                     
                </div><br>
                <div class="card">
                    <div class="card-header">Table Course of {{$level3->level}} Students</div>
                    <div class="card-body">

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="panel panel-default">

        <div class="panel-heading clearfix">
            
        </div></div>
      
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                 <table class="table table-responsive ">
                     <table class="table">
                    <thead>
                        <tr>
                         
                            <th>Code</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($tableCourse4SStudentsObjects as $tableCourse4SStudents)
                        <tr>
                          
                            <td>{{ $tableCourse4SStudents->code }}</td>
                            <td>{{ $tableCourse4SStudents->name }}</td>
                          
                       
                            
                            <td>

                               
                                <div>
                                        <a href="{{ route('4s_mark4.4s_mark4.index', $tableCourse4SStudents->id ) }}" class="btn btn-primary" title="Edit Table  Course  4S  Students">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true">Add Attendance</span>
                                        </a>
                                         

                                    </div>

                               
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                 

            </div>
        </div>

        <div class="panel-footer">
        
        </div>
        
      
    
    </div>
    </div></div></div></div>
@endsection