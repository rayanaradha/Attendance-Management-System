@extends('layouts.app')

@section('content')

 <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Add new student</div>
                    <div class="card-body">
                         <div class="panel panel-default">


            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('atts_1s.atts_1s.index') }}" class="btn btn-primary" title="Back">
                    <span class="glyphicon glyphicon-th-list" aria-hidden="true">Back</span>
                </a>
            </div>

        </div><br>

        <div class="panel-body">
        
            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('atts_1s.atts_1s.store') }}" accept-charset="UTF-8" id="create_atts_1s_form" name="create_atts_1s_form" class="form-horizontal">
            {{ csrf_field() }}
            @include ('atts_1s.form', [
                                        'atts1s' => null,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="Add">
                    </div>
                </div>

            </form>

        </div>
    </div>

@endsection


