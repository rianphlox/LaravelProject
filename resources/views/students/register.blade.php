@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-12">

    {{-- Breadcrumb --}}
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Tables</a></li>
      <li class="breadcrumb-item"><a href="#">Student</a></li>
      <li class="breadcrumb-item active" aria-current="page">Register</li>
    </ol>

    <div class="card card-user">
      <div class="card-header">
        <h5 class="card-title">Register Courses</h5>
      </div>

      <div class="card-body">
        @if($courses->count() > 0)
          <table class="table table-striped table-hover">
            <thead class="thead-light">
              <tr>
                <th>Course Code</th>
                <th>Course Name</th>
                <th>Credit Load</th>
                <th class="text-center">Score</th>
                <th>Grade</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($courses as $course)
                {!! Form::open(['action' => ['StudentsController@addcourse', $mat], 'method' => 'POST']) !!}
                <tr>
                  <td>
                    PRE{{ $course->course_code }}
                    {!! Form::hidden('course_code', $course->course_code) !!}
                  </td>
                  <td>
                    {{ $course->course_name }}
                    {!! Form::hidden('course_name', $course->course_name) !!}
                  </td>
                  <td class="text-center">
                    {{ $course->credit_load }}
                    {!! Form::hidden('course_id', $course->course_id) !!}
                  </td>
                  <td>
                    {!! Form::number('score', null, [
                        'class' => 'form-control score',
                        'autocomplete' => 'off',
                        'placeholder' => 'Enter score',
                        'id' => 'score_'.$course->course_id
                    ]) !!}
                  </td>
                  <td>
                    {!! Form::text('grade', null, [
                        'class' => 'form-control grade',
                        'autocomplete' => 'off',
                        'placeholder' => 'Grade',
                        'id' => 'grade_'.$course->course_id
                    ]) !!}
                  </td>
                  <td>
                    {!! Form::hidden('mat', $mat) !!}
                    {!! Form::submit('Add', ['class' => 'btn btn-info btn-sm']) !!}
                  </td>
                </tr>
                {!! Form::close() !!}
              @endforeach
            </tbody>
          </table>
        @else
          <p class="text-muted">No courses available for registration.</p>
        @endif
      </div>
    </div>

  </div>
</div>
@endsection
