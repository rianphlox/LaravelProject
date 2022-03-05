@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">

      <div >
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Tables</a></li>
          <li class="breadcrumb-item"><a href="#">Student</a></li>
          <li class="breadcrumb-item active" aria-current="page">Register</li>
        </ol>
      </div>

      <div class="card card-user">
        <div class="card-header">
          <h5 class="card-title">Register Courses</h5>
        </div>
        <div class="card-body">
          <table class="table">
              <thead>
                  <th>Course Code</th>
                  <th>Course Name</th>
                  <th>Credit Load</th>
                  <th><center>Score</center></th>
                  <th>Grade</th>

              </thead>
              <tbody>
                    @foreach($courses as $course)
                        {!! Form::open(['action' => ['StudentsController@addcourse', $mat], 'method' => 'POST']) !!}
                        
                        <tr>
                            <td>PRE{{ $course->course_code }} </td>
                            {!! Form::hidden('course_code', $course->course_code) !!}

                            <td>{{ $course->course_name }} </td>
                            {!! Form::hidden('course_name', $course->course_name) !!}

                            <td><center>{{ $course->credit_load }} </center></td>
                            {!! Form::hidden('course_id', $course->course_id ) !!}

                            <td>
                                <div class="form-group">
                                    {!! Form::number('score', '', ['class' => 'form-control score', 'id' => '', 'autocomplete' => 'off']) !!}
                                </div>
                            </td>
                            <div>
                                {!! Form::hidden('mat', $mat) !!}
                            </div>
                            <td>
                                <div class="form-group">
                                    {!! Form::text('grade', '', ['class' => 'form-control grade', 'id' => '', 'autocomplete' => 'off']) !!}
                                </div>
                            </td>
                            <td>
                                {!! Form::submit('Add', ['class' => '_add btn btn-info']) !!}
                            </td>
                        </tr>
                        {!! Form::close() !!}
                  
                    @endforeach
                      
              </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection

