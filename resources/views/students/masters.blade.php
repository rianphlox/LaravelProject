@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Showing Results for {{ count($students) }} Students</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                <th class="th-sm text-secondary">Full Name</th>
                <th class="th-sm text-secondary">Matriculation number</th>
                <th class="th-sm text-secondary">Department</th>
                <!-- <th class="th-sm">Course</th>
                <th class="th-sm">Score</th>
                <th class="th-sm">Grade</th> -->
                <th class="th-sm"></th>
              </thead>
              <tbody>
                    @foreach($students as $student)
                      
                      <tr>
                        <td> {{ $student->full_name }} </td>
                        <td> <span class='text-info'>PG/</span><a href='/students/{{ $student->mat_no }}/{{ $student->programme }}/courses'>{{ $student->mat_no }}</a> </td>
                        <td> {{ $student->department }}</td>
                        
                        <td>
                          <a href="/students/{{ $student->id }}/edit" type="button" rel="tooltip" class="btn btn-small btn-success">
                              <!-- <i class="material-icons">edit</i> -->
                              <span>Edit</span>
                          </a>
                        </td>

                      </tr>
                    @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    
  </div>
@endsection