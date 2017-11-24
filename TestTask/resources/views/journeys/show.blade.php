@extends('layouts.app')

@section('content')
    <div class="span8">
        <h2>Kelionės duomenys</h2>           
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Maršrutas</th>
                    <th>Išvyko iš terminalo</th>
                    <th>Spidometro parodymai prieš</th>
                    <th>Atvyko pas klientą</th>
                    <th>Iškrovimas (min)</th>
                    <th>Išvyko iš kliento</th>
                    <th>Atvyko į terminalą</th>
                    <th>Spidometro parodymai po</th>
                    <th>Atstumas (km)</th>
                    <th>Kuras (l)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $journey->date }}</td>
                    <td>{{ $journey->route }}</td>
                    <td>{{ $journey->exit_terminal_time }}</td>
                    <td>{{ $journey->speedometer_stats_before }}</td>
                    <td>{{ $journey->arrive_client_time }}</td>
                    <td>{{ $journey->unloading_time_minutes }}</td>
                    <td>{{ $journey->exit_client_time }}</td>
                    <td>{{ $journey->arrive_terminal_time }}</td>
                    <td>{{ $journey->speedometer_stats_after }}</td>
                    <td>{{ $journey->distance_kms }}</td>
                    <td>{{ $journey->fuel_litres }}</td>
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
                <li><a href="{{ action('JourneysController@edit', [$journey->id]) }}"><span class="icon-wrench"></span> Redaguoti</a></li>
                <li><a href="#" onclick="
                  var result = confirm('Ar tikrai nori ištrinti šį įrašą?');
                      if( result ){
                              event.preventDefault();
                              document.getElementById('delete-form').submit();
                      }"><span class="icon-trash"></span> Ištrinti</a>

                    <form id="delete-form" action="{{ action('JourneysController@destroy', [$journey->id]) }}" 
                    method="POST" style="display: none;"><input type="hidden" name="_method" value="delete">
                        {{ csrf_field() }}
                    </form>
                </li>
                <li><a href="/journeys"><span class="icon-wrench"></span> Atgal</a></li>
            </ul>
        </div>
    </div>
@endsection


                       
                       