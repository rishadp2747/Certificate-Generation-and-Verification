@extends('layout.app')
@section('content')


<div class="container-fluid">
        <div class="d-flex justify-content-center p-5 m-5">
            <div class="flex-row justify-content-center">
            @include('layout.flash')
            <h4 class="h4 p-3 text-center">Generate Certificates</h4>

            <form action="{{ url('certificate') }}" method="POST" name="importform">
                @csrf
               


                <div class="form-group">
                <select class="form-select" aria-label="" name="event">
                    <option value="0" selected>Select an event</option>

                    @foreach ($events as $event) 
     
                        <option value="{{$event->id}}">{{$event->name}}</option>


                    @endforeach

                </select>
                </div>

                <a href="{{ url('/') }}" class="btn btn-primary  active" role="button" aria-pressed="true">Go Home</a>

 
                <button class="btn btn-success">Generate</button>
            </form>
        </div>
        </div>
        </div>


@endsection