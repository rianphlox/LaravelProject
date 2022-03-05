@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
        <div >
            <ol class="breadcrumb">
            
            <li class="breadcrumb-item"><a href="{{ route('broadsheet') }}">Tables</a></li>
            
            <li class="breadcrumb-item active" aria-current="page">{{ $programme == 'part-time' ? 'Part Time' : Str::ucfirst($programme) }}</li>
            </ol>
        </div>
        <div class="card">
            <div class="card-header">
            <h4 class="card-title">Showing All Students for {{ ucwords($programme) }} {{ "(Year $year)" }}</h4>
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                <thead>
                    <th class="th-sm text-secondary">Full Name</th>
                    <th class="th-sm  text-secondary">Mat No</th>
                    
                    @foreach($courses as $course)
                        <th class="th-sm text-secondary">PRE{{ $course->course_code }}</th>
                    @endforeach
                    
                </thead>
            
                <tbody>
                    @foreach ($students as $student)
                        {{-- @php
                            extract($student)
                        @endphp --}}
                        <tr>
                            <td>{{ $student->full_name }}</td>
                            <td>{{ $student->mat_no }}</td>
                            @php
                                $table_name = "{$student->mat_no}_table";
                                if ($course_id < 2) {
                                    $results = DB::select("SELECT * FROM $table_name WHERE course_id > 1 AND course_id < 2 ORDER BY course_id ASC") ;
                                } elseif ($course_id > 2) {
                                    $results = DB::select("SELECT * FROM $table_name WHERE course_id > 2 ORDER BY course_id ASC" ) ;
                                }
                                foreach ($results as $course) {
                                    $grade = strtoupper($course->grade);
                                    echo "<td>$grade</td>";
                                }
                            @endphp
                        </tr>
                        
                        
                    @endforeach
                    
                </tbody>
                </table>
            </div>
            </div>
        </div>
        </div>
        
    </div>
    </div>
@endsection