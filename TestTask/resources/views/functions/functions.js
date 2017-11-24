<script type="text/javascript">
    function speedometerDiff() {
        document.journeyEditForm.distance_kms.value =
            (document.journeyEditForm.speedometer_stats_after.value -0) - 
            (document.journeyEditForm.speedometer_stats_before.value -0);
        if(document.journeyEditForm.distance_kms.value < 0)
        {
            document.journeyEditForm.distance_kms.value = "Parodymų skirtumas negali būti neigiamas!";
        }
    }
</script>

<script type="text/javascript">
    function fuelConsumption() {
        arrive_client_time - exit_terminal_time

        document.journeyEditForm.fuel_litres.value =
           
    }
</script>

<script>
    function confirmDelete(){
        var x = confirm("Ar tikrai norite ištrinti šį įrašą?");
        if (x)
            return true;
        else
            return false;
    }
</script>