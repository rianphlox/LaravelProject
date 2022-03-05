@extends('layouts.app')

@section('content')
<div class="row">

          
    <div class="col-md-12">
      <div >
        <ol class="breadcrumb">
          
          <li class="breadcrumb-item"><a href="">Tables</a></li>
          <li class="breadcrumb-item active" aria-current="page">Student</li>
        </ol>
      </div>
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Showing Registered Courses for PG/{{ $mat }}</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              
              @if (!count($courses) )
                <thead class="text-primary">
                  <th class="th-sm">Course Code</th>
                  <th class="th-sm">Course Name</th>
                  <th class="">Year</th>
                  <th class="">Semester</th>
                  <th class="">Grade</th>
                  <th class=""></th>
                  <th class=""></th>
                </thead>
                <tbody>
                  <tr>
                    <td>No Registered Courses</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                    <a href='{{ route('register', [$mat, $programme]) }}' class="btn btn-small btn-warning">
                        <span>Register</span>
                      </a>
                    </td>
                  </tr>
                </tbody>
              

                @else
                  <thead>
                  <th class="th-sm">Course Code</th>
                      <th class="th-sm">Course Name</th>
                      <th class="">Year</th>
                      <th class="">Semester</th>
                      <th class="">Grade</th>
                      <th class="">Score</th>
                      <th class=""></th>
                  </thead>
                  <tbody>
                    @foreach($courses as $course)
                      
                        <tr>
                          <td><?= "PRE$course->course_code"; ?></td>
                          <td>{{ $course->course_name }}</td>
                          <td> <center>{{ explode('.', $course->course_id)[0] }}</center> </td>
                          <td> <center>{{ explode('.', $course->course_id)[1] }}</center> </td>
                          <td><center>{{ strtoupper($course->grade) }}</center></td>
                          <td><center> {{ $course->score }} </center></td>
                          <td class="_remark">
                            <a href="" type="button" rel="tooltip" class="btn btn-small btn-info">
                              <!-- <i class="material-icons">edit</i> -->
                              <span>Edit</span>
                            </a>
                          </td>
                        </tr>
                    <?php endforeach; ?>

                  </tbody>
                @endif
                
            </table>
          </div>
        </div>
      </div>
    </div>
    
  </div>
@endsection