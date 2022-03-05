@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                <thead class=" text-primary">
                    <th class="th-sm text-secondary">Programme</th>
                    <th class="th-sm text-secondary">Year</th>
                    <th class="th-sm text-secondary">Semester</th>
                    
                    <!-- <th class="th-sm"></th> -->
                </thead>
                <tbody>
                    <tr>
                    <td>Masters (M.Sc ENG)</td>
                    <td>
                        <a href="{{ route('results', ['masters', 1.1]) }}" type="button" class="btn btn-small btn-success">
                        <span>Year 1</span>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('results', ['masters', 2.1]) }}" type="button" class="btn btn-small btn-success">
                        <span>Year 2</span>
                        </a>
                    </td>
                    
                    </tr>
                    <tr>
                    <td>Diploma</td>
                    <td>
                        <a href="{{ route('results', ['diploma', 1.1]) }}" type="button" class="btn btn-small btn-success">
                        <span>Year 1</span>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('results', ['diploma', 2.1]) }}" type="button" class="btn btn-small btn-success">
                        <span>Year 2</span>
                        </a>
                    </td>
                    
                    </tr>
                    <tr>
                    <td>Part Time</td>
                    <td>
                        <a href="{{ route('results', ['part_time', 1.1]) }}" type="button" class="btn btn-small btn-success">
                        <span>Year 1</span>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('results', ['part_time', 2.1]) }}" type="button" class="btn btn-small btn-success">
                        <span>Year 2</span>
                        </a>
                    </td>
                    
                    </tr>
                </tbody>
                </table>
            </div>
            </div>
        </div>
        </div>
        
    </div>
    </div>
@endsection

