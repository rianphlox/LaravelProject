@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Tables</a></li>
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
                        <thead class="text-primary">
                            <tr>
                                <th>Course Code</th>
                                <th>Course Name</th>
                                <th>Year</th>
                                <th>Semester</th>
                                <th>Grade</th>
                                <th>Score</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($courses as $course)
                                <tr>
                                    <td>{{ "PRE{$course->course_code}" }}</td>
                                    <td>{{ $course->course_name }}</td>
                                    <td class="text-center">{{ explode('.', $course->course_id)[0] }}</td>
                                    <td class="text-center">{{ explode('.', $course->course_id)[1] }}</td>
                                    <td class="text-center">{{ strtoupper($course->grade) }}</td>
                                    <td class="text-center">{{ $course->score }}</td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-info">Edit</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">No Registered Courses</td>
                                    <td>
                                        <a href="{{ route('register', [$mat, $programme]) }}" 
                                           class="btn btn-sm btn-warning">
                                            Register
                                        </a>
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
