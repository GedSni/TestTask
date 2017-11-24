@extends('layouts.app')

@section('content')

<h1>Redaguojama: {{ $user->name }}</h1>
<br></br>
<div class="col-md-6">
    {!! Form::model($user, ['method' => 'PATCH', 'action' => ['UsersController@update', $user->id]]) !!}
        @include('errors.errors');
        @include('partials.userForm',['submitButton' => 'Redaguoti']);
        <div id="browse_app"> <a class="btn btn-large btn-primary" href="./">Atgal</a> </div>
    {!! Form::close() !!}
</div> 

{!! Form::close() !!}

@endsection