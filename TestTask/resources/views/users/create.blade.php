@extends('layouts.app')

@section('content')

<h1>Vartotojo registravimas</h1>
<br></br>
{!! Form::open(['url' => 'users']) !!}
    <div class="col-md-6">

        @include('errors.errors');
        @include('partials.userForm',['submitButton' => 'Registruoti']);
        <div id="browse_app"> <a class="btn btn-large btn-primary" href="/home">Atgal</a> </div>
        
    </div> 

{!! Form::close() !!}

@endsection