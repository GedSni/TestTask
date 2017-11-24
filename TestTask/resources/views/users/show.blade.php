@extends('layouts.app')

@section('content')
    <div class="span8">
        <h2>Profilis</h2>           
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Vardas</th>
                    <th>El. paštas</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
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
                <li><a href="{{ action('UsersController@edit', [$user->id]) }}"><span class="icon-wrench"></span> Redaguoti</a></li>
                <li><a href="#" onclick="
                  var result = confirm('Ar tikrai nori ištrinti šį įrašą?');
                      if( result ){
                              event.preventDefault();
                              document.getElementById('delete-form').submit();
                      }"><span class="icon-trash"></span> Ištrinti</a>

                    <form id="delete-form" action="{{ action('UsersController@destroy', [$user->id]) }}" 
                    method="POST" style="display: none;"><input type="hidden" name="_method" value="delete">
                        {{ csrf_field() }}
                    </form>
                </li>
                <li><a href="/users"><span class="icon-wrench"></span> Atgal</a></li>
            </ul>
        </div>
    </div>
@endsection