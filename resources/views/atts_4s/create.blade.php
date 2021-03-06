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
                <a href="{{ route('atts_4s.atts_4s.index') }}" class="btn btn-primary" title="Show All Atts 4S">
                    <span class="glyphicon glyphicon-th-list" aria-hidden="true">Back</span>
                </a>
            </div>

        </div>

        <div class="panel-body">
        
            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('atts_4s.atts_4s.store') }}" accept-charset="UTF-8" id="create_atts_4s_form" name="create_atts_4s_form" class="form-horizontal">
            {{ csrf_field() }}
            @include ('atts_4s.form', [
                                        'atts4s' => null,
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


