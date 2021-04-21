@extends('layout.app')
@section('content')


<div class="container-fluid">
        <div class="d-flex justify-content-center p-5 m-5">
            <div class="flex-row justify-content-center">
            @include('layout.flash')
            <h4 class="h4 p-3 text-center">Verify Certificates</h4>

            <form action="{{ url('verify') }}" method="POST" name="importform">
                @csrf
               
                <div class="form-group">
                <label for="name">Verification Code</label>
                <input type="text" class="form-control" name="code" aria-describedby="nameHelp" placeholder="">
                <small id="nameHelp" class="form-text text-muted">eg: TRIAC-1000</small>
                @error('name')
                    <p class="p-2 red-alert" role="alert">{{ $message }}</p>
                @enderror
            </div>

                <a href="{{ url('/') }}" class="btn btn-primary  active" role="button" aria-pressed="true">Go Home</a>

 
                <button class="btn btn-success">Verify</button>
            </form>
        </div>
        </div>
        </div>


@endsection