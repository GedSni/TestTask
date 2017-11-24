<div class="row">
    <div class="col-xs-6 form-group">
        {!! Form::label('date', 'Kelionės data') !!}
        {!! Form::date('date', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
    </div>
    <div class="col-xs-6 form-group">
        {!! Form::label('route', 'Maršrutas') !!}
        {!! Form::text('route', null, ['placeholder'=>'Maršrutas', 'class' => 'form-control']) !!}
    </div>
    <div class="col-xs-6 form-group">
        {!! Form::label('exit_terminal_time', 'Išvyko iš terminalo') !!}
        {!! Form::time('exit_terminal_time', null, ['class' => 'form-control']) !!}
    </div>
    <div class="col-xs-6 form-group">
        {!! Form::label('speedometer_stats_before', 'Spidometro parodymai prieš kelionę') !!}
        {!! Form::number('speedometer_stats_before', null, ['onChange'=>'speedometerDiff()', 'placeholder'=>'Spidometro parodymai', 'min'=>0, 'class' => 'form-control']) !!}
    </div>
    <div class="col-xs-6 form-group">
        {!! Form::label('arrive_client_time', 'Atvyko pas klientą') !!}
        {!! Form::time('arrive_client_time', null, ['class' => 'form-control']) !!}
    </div>
    <div class="col-xs-6 form-group">
        {!! Form::label('unloading_time_minutes', 'Iškrovimas (minutės)') !!}
        {!! Form::number('unloading_time_minutes', null, ['placeholder'=>'Iškrovimas (minutės)', 'min'=>0, 'class' => 'form-control']) !!}
    </div>
    <div class="col-xs-6 form-group">
        {!! Form::label('exit_client_time', 'Išvyko iš kliento') !!}
        {!! Form::time('exit_client_time', null, ['class' => 'form-control']) !!}
    </div>
    <div class="col-xs-6 form-group">
        {!! Form::label('arrive_terminal_time', 'Atvyko į terminalą') !!}
        {!! Form::time('arrive_terminal_time', null, ['class' => 'form-control']) !!}
    </div>
    <div class="col-xs-6 form-group">
        {!! Form::label('speedometer_stats_after', 'Spidometro parodymai po kelionės') !!}
        {!! Form::number('speedometer_stats_after', null, ['onChange'=>'speedometerDiff()', 'placeholder'=>'Spidometro parodymai', 'min'=>0, 'class' => 'form-control']) !!}
    </div>
   
    <div class="col-xs-6 form-group">
        {!! Form::Label('vehicle_id', 'Transporto priemonė:') !!}
        <select class="form-control" name="vehicle_id">
            @foreach($vehicles as $vehicle)
                <option value="{{$vehicle->id}}">{{$vehicle->brand}} {{$vehicle->model}} {{$vehicle->year}} m. </option>
            @endforeach
        </select>
    </div>
    
</div>
<div class="row">
    <div class="col-xs-6 form-group">
        {!! Form::label('distance_kms', 'Atstumas') !!}
        {!! Form::text('distance_kms', null, ['readonly', 'class' => 'form-control']) !!}
    </div>
</div>

<div class=" form-group">
    {!! Form::submit($submitButton, ['class' => 'btn btn-primary']) !!}
</div>

