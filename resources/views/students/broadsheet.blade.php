@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Programmes</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="text-primary">
                            <tr>
                                <th class="th-sm text-secondary">Programme</th>
                                <th class="th-sm text-secondary">Year 1</th>
                                <th class="th-sm text-secondary">Year 2</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $programmes = [
                                    'masters'   => 'Masters (M.Sc ENG)',
                                    'diploma'   => 'Diploma',
                                    'part_time' => 'Part Time',
                                ];
                            @endphp

                            @foreach ($programmes as $key => $name)
                                <tr>
                                    <td>{{ $name }}</td>
                                    <td>
                                        <a href="{{ route('results', [$key, 1.1]) }}" 
                                           class="btn btn-sm btn-success">
                                           Year 1
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('results', [$key, 2.1]) }}" 
                                           class="btn btn-sm btn-success">
                                           Year 2
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
