@extends('layouts.app')

@section('content')

<h1>Redaguojama: {{ $vehicle->brand }} {{ $vehicle->model }}</h1>
<br></br>

    {!! Form::model($vehicle, ['method' => 'PATCH', 'action' => ['VehiclesController@update', $vehicle->id]]) !!}
        @include('errors.errors');
        @include('partials.vehicleForm',['submitButton' => 'Redaguoti']);
        <div id="browse_app"> <a class="btn btn-large btn-primary" href="./">Atgal</a> </div>
    {!! Form::close() !!}
</div> 

@endsection