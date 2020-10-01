@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class=>
                      <a href="{{ url('/home') }}" title="Go back to main menu"><button class="btn btn-warning "><i class="fa fa-arrow-left" aria-hidden="true"></i>Admin Menu  </button></a>
                        <a href="{{ url('/table__course__4m__students') }}" title="Go back to main menu"><button class="btn btn-primary "><i class="fa fa-arrow-left" aria-hidden="true"></i>Attendance Menu  </button></a>                        
  <br><br>                       
 
<br><br>
                       
               <div class="card">
                    <div class="card-header">Attendance table of course {{$data->name}}</div>
                    <div class="card-body">

    <table class="table">
                    <thead>
                        <tr class="tr btn-dark">
    
   
    <th>Course Code :{{$data->code}}  </th>
    <th>Course Name :{{$data->name}}</th>

    <th>date :{{$SingleData->date8}}</th>
    <th>Start_Time :{{$SingleData->Start_Time8}}</th>
    <th>End_Time :{{$SingleData->End_Time8}}</th>
    <th>Hall :{{$SingleData->hall8}}</th>

     </tr>
                    </thead>  </table>
                        
                       

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Registration No</th>
                            <th>Name</th>
                             <th>last submitted attendance </th>
                            <th>total Lecture attend</th>
                            <th>Percentage</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
      @foreach($atts as $att)
 <tr>

         @if( $att->precentage7 <$items->precentage)                         
                                <td style=>{{ $att->id }}</td>
                            <td style="background: Teal">{{ $att->Reg_No }}</td>
                            <td style="background: Teal">{{ $att->name }}</td>
                            <td><font color="red">{{ $att->attend_mark7 }}</font></td>
                            <td>{{ $att->lectureattend7 }}</td>
                            <td >{{ $att->precentage7}}%</td>
                            
                               <td>        <a href="#" class="btn btn-primary" title="Edit Atts">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true">Edit</span>
                                        </a></td>
                                
         @else
                            <td>{{ $att->id }}</td>
                            <td>{{ $att->Reg_No }}</td>
                            <td>{{ $att->name }}</td>
                            <td><font color="red">{{ $att->attend_mark7 }}</font></td>
                            <td>{{ $att->lectureattend7 }}</td>
                            <td style="background: ">{{ $att->precentage7 }}%</td>

                            <td>

                                <form method="POST" action="#" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                   
                                       <a href="#" class="btn btn-primary" title="Edit Atts">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true">Edit</span>
                                        </a>

                                        
                                    </div>

                                </form>
                                
                            </td>


         @endif  
   

                   </tr>       
                    @endforeach
                    </tbody>
                </table>
                   
            </div>
        </div>
            

           
                  <a id = "r"></a>
           
        <div class="panel-footer">
            {!! $atts->render() !!}
        </div>
         </div>
 
        
         </div>
      </div> 
    </div> 
    </div>
             </div>
     </div>
 
        
@endsection


