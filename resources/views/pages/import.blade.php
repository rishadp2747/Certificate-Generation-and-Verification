@extends('layout.app')
@section('content')

    
<div class="container">
    <div class="card mt-4">
        <div class="card-header">
            Import Excel Sheet with (Name, Email) fields
        </div>
            @if ($errors->any())
        <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
   @if($message = Session::get('success'))
   <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
           <strong>{{ $message }}</strong>
   </div>
   @endif
        <div class="card-body">
            <form action="{{ url('import') }}" method="POST" name="importform" enctype="multipart/form-data">
                @csrf



                <select class="form-select m-3" aria-label="" name="event">
                    <option value="0" selected>Select an event</option>

                    @foreach ($events as $event) 
     
                        <option value="{{$event->id}}">{{$event->name}}</option>


                    @endforeach

                </select>

                <input type="file" name="import_file" class="form-control">
                <br>
                <a href="{{ url('/') }}" class="btn btn-primary  active" role="button" aria-pressed="true">Go Home</a>

                <button class="btn btn-success">Import File</button>
            </form>
        </div>
    </div>
   
</div>
 
</div>
@endsection