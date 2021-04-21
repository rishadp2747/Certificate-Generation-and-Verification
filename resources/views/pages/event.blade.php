@extends('layout.app')
@section('content')

    <div class="container-fluid">
        <div class="d-flex justify-content-center p-5 m-5">
            <div class="flex-row justify-content-center">
            @include('layout.flash')
            <h4 class="h4 p-3 text-center">Create an Event </h4>
            <form action="{{ url('event') }}" method="POST" name="importform">
            @csrf
            <div class="form-group">
                <label for="name">Event Name</label>
                <input type="text" class="form-control" name="name" aria-describedby="nameHelp" placeholder="Enter event name">
                <small id="nameHelp" class="form-text text-muted">eg: Triac 2.0</small>
                @error('name')
                    <p class="p-2 red-alert" role="alert">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">Event Code</label>
                <input type="text" class="form-control" name="code" aria-describedby="codeHelp" placeholder="Enter event code">
                <small id="codeHelp" class="form-text text-muted">eg: TRIAC2</small>
                @error('code')
                    <p class="p-2 red-alert" role="alert">{{ $message }}</p>
                @enderror
            </div>

            <a href="{{ url('/') }}" class="btn btn-primary  active" role="button" aria-pressed="true">Go Home</a>

            <button class=" btn btn-success">Create</button>
        </form>


            </div>

        </div>
        
    </div>


@endsection