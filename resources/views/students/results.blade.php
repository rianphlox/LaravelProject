@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-12">

    {{-- Breadcrumb --}}
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{ route('broadsheet') }}">Tables</a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">
        {{ $programme === 'part-time' ? 'Part Time' : Str::ucfirst($programme) }}
      </li>
    </ol>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">
          Showing All Students for {{ ucwords($programme) }} {{ "(Year $year)" }}
        </h4>
      </div>

      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped table-hover">
            <thead class="thead-light">
              <tr>
                <th class="th-sm text-secondary">Full Name</th>
                <th class="th-sm text-secondary">Mat No</th>
                @foreach($courses as $course)
                  <th class="th-sm text-secondary">PRE{{ $course->course_code }}</th>
                @endforeach
              </tr>
            </thead>
            <tbody>
              @forelse ($students as $student)
                <tr>
                  <td>{{ $student->full_name }}</td>
                  <td>{{ $student->mat_no }}</td>

                  @foreach($courses as $course)
                    @php
                      $grade = $student->results[$course->id]->grade ?? '-';
                    @endphp
                    <td>{{ strtoupper($grade) }}</td>
                  @endforeach
                </tr>
              @empty
                <tr>
                  <td colspan="{{ 2 + $courses->count() }}" class="text-center text-muted">
                    No students found.
                  </td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
</div>
@endsection
