@extends('layout.app')
@section('content')

    <div class="m-2 p-3 container-fluid">

        <h1 class="h1 text-center">Certificate Generation</h1>
        
        <h4 class="h4">Follow the instruction below:</h4>



        <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Create an Event
                <span class="badge  badge-pill">
                    <a href="{{ url('event') }}" class="btn btn-primary active" role="button" aria-pressed="true">Create</a>
                </span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                  Import your excel sheet with participants information (Name, Email)
                <span class="badge badge-pill">
                   <a href="{{ url('import') }}" class="btn btn-primary  active" role="button" aria-pressed="true">Import</a>
                </span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Generate Your Certificate
                <span class="badge badge-pill">
                    <a href="{{ url('certificate') }}" class="btn btn-primary  active" role="button" aria-pressed="true">Generate</a>
                </span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                 Verify Certificate
                <span class="badge  badge-pill">
                    <a href="{{ url('verify') }}" class="btn btn-primary active" role="button" aria-pressed="true">Verify</a>
                </span>
            </li>
        </ul>


    </div>




@endsection