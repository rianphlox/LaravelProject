@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      
      <div class="card-header">
        <h4 class="card-title">
          Showing Results for {{ $students->count() }} Student{{ $students->count() > 1 ? 's' : '' }}
        </h4>
      </div>

      <div class="card-body">
        <div class="table-responsive">
          @if($students->count() > 0)
            <table class="table table-striped table-hover">
              <thead class="text-primary">
                <tr>
                  <th class="th-sm text-secondary">Full Name</th>
                  <th class="th-sm text-secondary">Matriculation Number</th>
                  <th class="th-sm text-secondary">Department</th>
                  <th class="th-sm text-secondary text-center">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($students as $student)
                  <tr>
                    <td>{{ $student->full_name }}</td>
                    <td>
                      <span class="text-info">PG/</span>
                      <a href="{{ route('students.courses', [$student->mat_no, $student->programme]) }}">
                        {{ $student->mat_no }}
                      </a>
                    </td>
                    <td>{{ $student->department }}</td>
                    <td class="text-center">
                      <a href="{{ route('students.edit', $student->id) }}" 
                         class="btn btn-sm btn-success">
                        <i class="fas fa-edit"></i> Edit
                      </a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          @else
            <p class="text-muted text-center mb-0">No students found.</p>
          @endif
        </div>
      </div>

    </div>
  </div>
</div>
@endsection
