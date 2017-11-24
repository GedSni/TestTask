@extends('layouts.app')

@section('content')

<div class="container">
            <div class="row">
                {!! Form::open(['url' => 'journeys/check']) !!}
                    @include('errors.errors');
                    <div class="container">
                        <div class="col-xs-6 form-group">
                            {!! Form::Label('user_id', 'Vartotojas') !!}
                            <select class="form-control" name="user_id">
                                @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}, {{$user->email}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="container">
                        <div class="col-xs-6 form-group">
                            {!! Form::label('date_from', 'Nuo') !!}
                            {!! Form::date('date_from', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-xs-6 form-group">
                            {!! Form::label('date_to', 'Iki') !!}
                            {!! Form::date('date_to', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="container">
                        <div class="col-xs-6 form-group">
                            {!! Form::submit("Ieškoti", ['class' => 'btn btn-primary']) !!}
                            <a class="btn btn-large btn-primary" href="/journeys">Atgal</a>
                        </div>
                        
                    </div>
                {!! Form::close() !!}
            </div>
    </div>

    
@endsection