<div class="row">
    <div class="col-xs-6 form-group">
        {!! Form::label('brand', 'Markė') !!}
        {!! Form::text('brand', null, ['placeholder'=>'Markė', 'class' => 'form-control']) !!}
    </div>
    <div class="col-xs-6 form-group">
        {!! Form::label('model', 'Modelis') !!}
        {!! Form::text('model', null, ['placeholder'=>'Modelis', 'class' => 'form-control']) !!}
    </div>
    <div class="col-xs-6 form-group">
        {!! Form::label('year', 'Pagaminimo metai') !!}
        {!! Form::number('year', null, ['placeholder'=>'Pagaminimo metai', 'class' => 'form-control']) !!}
    </div>
    <div class="col-xs-6 form-group">
        {!! Form::label('fuel_idle', 'Kuro sąnaudos stovint (l/h)') !!}
        {!! Form::number('fuel_idle', null, ['placeholder'=>'Kuro sąnaudos stovint', 'class' => 'form-control']) !!}
    </div>
    <div class="col-xs-6 form-group">
        {!! Form::label('fuel_road', 'Kuro sąnaudos kelyje (l/h)') !!}
        {!! Form::number('fuel_road', null, ['placeholder'=>'Kuro sąnaudos kelyje', 'class' => 'form-control']) !!}
    </div>
    <div class="col-xs-6 form-group">
        {!! Form::label('fuel_load', 'Kuro sąnaudos iškraunant krovinį (l/h)') !!}
        {!! Form::number('fuel_load', null, ['placeholder'=>'Kuro sąnaudos iškraunant krovinį', 'class' => 'form-control']) !!}
    </div>
</div>
<div class="row">
    <div class="col-xs-6 form-group">
        {!! Form::submit($submitButton, ['class' => 'btn btn-primary']) !!}
    </div>
</div>