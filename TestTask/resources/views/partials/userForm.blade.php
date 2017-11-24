<div class="row">
    <div class="col-xs-6 form-group">
        {!! Form::label('name', 'Vardas') !!}
        {!! Form::text('name', null, ['placeholder'=>'Vardas', 'class' => 'form-control']) !!}
    </div>
    <div class="col-xs-6 form-group">
        {!! Form::label('email', 'El. paštas') !!}
        {!! Form::email('email', null, ['placeholder'=>'El. paštas', 'class' => 'form-control']) !!}
    </div>
</div>
<div class="row">
    <div class="col-xs-6 form-group">
        {!! Form::submit($submitButton, ['class' => 'btn btn-primary']) !!}
    </div>
</div>