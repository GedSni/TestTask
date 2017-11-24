@extends('layouts.app')

@section('content')
    <div class="span8">
        <h2>Transporto priemonės specifikacija</h2>           
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Markė</th>
                    <th>Modelis</th>
                    <th>Pagaminimo metai</th>
                    <th>Kuro sąnaudos stovint (l/h)</th>
                    <th>Kuro sąnaudos kraunant (l/h)</th>
                    <th>Kuro sąnaudos kelyje (l/h)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $vehicle->brand }}</td>
                    <td>{{ $vehicle->model }}</td>
                    <td>{{ $vehicle->year }}</td>
                    <td>{{ $vehicle->fuel_idle }}</td>
                    <td>{{ $vehicle->fuel_load }}</td>
                    <td>{{ $vehicle->fuel_road }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="span2">
        <div class="btn-group">
            <a class="btn dropdown-toggle btn-primary" data-toggle="dropdown" href="#">
                Veiksmai 
                <span class="icon-cog icon-white"></span><span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li><a href="{{ action('VehiclesController@edit', [$vehicle->id]) }}"><span class="icon-wrench"></span> Redaguoti</a></li>
                <li><a href="#" onclick="
                  var result = confirm('Ar tikrai nori ištrinti šį įrašą?');
                      if( result ){
                              event.preventDefault();
                              document.getElementById('delete-form').submit();
                      }"><span class="icon-trash"></span> Ištrinti</a>

                    <form id="delete-form" action="{{ action('VehiclesController@destroy', [$vehicle->id]) }}" 
                    method="POST" style="display: none;"><input type="hidden" name="_method" value="delete">
                        {{ csrf_field() }}
                    </form>
                </li>
                <li><a href="/vehicles"><span class="icon-wrench"></span> Atgal</a></li>
            </ul>
        </div>
    </div>
@endsection