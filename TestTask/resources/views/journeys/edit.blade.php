@extends('layouts.app')

@section('content')

<h1>Redaguojama: Maršrutas - {{ $journey->route }} </h1>
<br></br>
<div class="col-md-6">
    {!! Form::model($journey, ['name'=>'journeyEditForm', 'method' => 'PATCH', 'action' => ['JourneysController@update', $journey->id]]) !!}
        @include('errors.errors');
        @include('partials.journeyForm',['submitButton' => 'Redaguoti']);
        <div id="browse_app"> <a class="btn btn-large btn-primary" href="./">Atgal</a> </div>
    {!! Form::close() !!}
</div> 

<script type="text/javascript">
    function speedometerDiff() {
        document.journeyEditForm.distance_kms.value =
            (document.journeyEditForm.speedometer_stats_after.value -0) - 
            (document.journeyEditForm.speedometer_stats_before.value -0);
        if(document.journeyEditForm.distance_kms.value < 0)
        {
            document.journeyEditForm.distance_kms.value = "Duomenys neteisingi!";
        }
    }   
</script>


@endsection