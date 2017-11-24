@extends('layouts.app')

@section('content')

<h1>Transporto priemonės registracija</h1>
<br></br>
{!! Form::open(['url' => 'vehicles']) !!}
    <div class="col-md-6">

        @include('errors.errors');
        @include('partials.vehicleForm',['submitButton' => 'Registruoti']);
        <div id="browse_app"> <a class="btn btn-large btn-primary" href="/home">Atgal</a> </div>
        
    </div> 

{!! Form::close() !!}

@endsection