$(document).ready(function(){
    $('#DisableWKEnds').datepicker({
        beforeShowDay: $.datepicker.noWeekends,
        minDate : new Date()
    });
});