@extends('layouts.app')

@section('content')
    <div class="container col-xs-6">
        <h1>Visų kelionių sąrašas</h1>
        <h2>Visos kelionės</h2>           
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Maršrutas</th>
                    <th>Vairuotojas</th>
                    <th>Tranporto priemonė</th>
                    <th>Nuoroda</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $var)
                <tr>
                    <td>{{ $var->date }}</td>
                    <td>{{ $var->route }}</td>
                    <td>{{ $var->name }}</td>
                    <td>{{ $var->brand }} {{ $var->model }}, {{ $var->year }} m.</td>
                    <td><a href="{{ action('JourneysController@show', [$var->id_j]) }}"><p>Išsamiau</p></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ action('JourneysController@search') }}"><p>Kelionių paieška</p></a>
    </div>
@endsection