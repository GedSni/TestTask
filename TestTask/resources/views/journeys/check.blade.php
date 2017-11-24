@extends('layouts.app')

@section('content')

<div class="container">
        <h1>Filtruotų kelionių sąrašas</h1>
        <h2>Rastos kelionės</h2>           
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Maršrutas</th>
                    <th>Vairuotojas</th>
                    <th>Nuoroda</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $var)
                <tr>
                    <td>{{ $var->date }}</td>
                    <td>{{ $var->route }}</td>
                    <td>{{ $users->name }}</td>
                    <td><a href="{{ action('JourneysController@show', [$var->id]) }}"><p>Išsamiau</p></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div id="browse_app"> <a class="btn btn-large btn-primary" href="/journeys/search">Atgal</a> </div>
    </div>

    


@endsection
   