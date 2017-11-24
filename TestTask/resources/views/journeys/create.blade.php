@extends('layouts.app')

@section('content')

<h1>Kelionės registracija</h1>
<br></br>

{!! Form::open(['name'=>'journeyCreateForm', 'url' => 'journeys']) !!}
    <div class="col-md-6">

        @include('errors.errors');
        @include('partials.journeyForm',['submitButton' => 'Registruoti']);
        <div id="browse_app"> <a class="btn btn-large btn-primary" href="/home">Atgal</a> </div>
        
    </div> 

{!! Form::close() !!}

<script type="text/javascript">
    function speedometerDiff() {
        document.journeyCreateForm.distance_kms.value =
            (document.journeyCreateForm.speedometer_stats_after.value -0) - 
            (document.journeyCreateForm.speedometer_stats_before.value -0);
        if(document.journeyCreateForm.distance_kms.value < 0)
        {
            document.journeyCreateForm.distance_kms.value = "Duomenys neteisingi!";
        }
    }   
</script>

@endsection