@extends('layouts.app')

@section('content')
    <h1>Transporto priemonių sąrašas</h1>
    <div class="container">
            <h2>Registruotos transporto priemonės</h2>           
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Markė</th>
                        <th>Modelis</th>
                        <th>Pagaminimo metai</th>
                        <th>Nuoroda</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($vehicles as $vehicle)
                    <tr>
                        <td>{{ $vehicle->brand }}</td>
                        <td>{{ $vehicle->model }}</td>
                        <td>{{ $vehicle->year }}</td>
                        <td><a href="{{ action('VehiclesController@show', [$vehicle->id]) }}"><p>Išsamiau</p></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
@endsection