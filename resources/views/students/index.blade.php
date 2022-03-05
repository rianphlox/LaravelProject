@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8">
            @include('inc.messages')
            <div class="card card-user">
                    <div class="card-header">
                    <h5 class="card-title">Add Record</h5>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['action' => ['StudentsController@store'], 'method' => 'POST']) !!}
                            <div class="row">
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        {!! Form::label('fullname', 'Full Name') !!}
                                        {!! Form::text('fullname', '', ['class' => 'form-control', 'autocomplete' => 'off']) !!}
                                    </div>
                                </div>
                                <div class="col-md-6 pl-1">
                                    <div class="form-group">
                                    {!! Form::label('mat', 'Matric No.' ) !!}
                                    {!! Form::text('mat', '', ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('dept', 'Department') !!}
                                        {!! Form::select('dept', ['PRE' => 'PRE'], '', ['class' => 'form-control', 'id' =>'_form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('programme', 'Programme' ) !!}
                                         {!! Form::select('programme', ['masters' => 'Masters', 'diploma' => 'Diploma', 'part_time' => 'Part time'], '', ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="_row">
                                <div class="_update ml-auto _mr-auto">
                                    {!! Form::submit('Add Record', ['class' => 'btn btn-block btn-primary']) !!}
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
