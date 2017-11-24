@extends('layouts.app')

@section('content')
    <h1>Vartotojų sąrašas</h1>
    <div class="container">
            <h2>Registruoti vartotojai</h2>           
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Vardas</th>
                        <th>El. paštas</th>
                        <th>Nuoroda</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td><a href="{{ action('UsersController@show', [$user->id]) }}"><p>Profilis</p></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
@endsection