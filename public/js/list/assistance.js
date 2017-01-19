
/**
 * Created by Dalia Pinto on 17/01/2017.
 */
//access to create incidence Modal
$('.dropdown-menu').find('li').find('a').eq(2).on('click', function (){
    $('#myModal').modal();
});
/**
 *onload dates in select
 */
function selectIncidence(days, dates){
    dates = moment();
    console.log(dates);
    $('#select').load(function(){
        for(var i = 0; i<dates.length; i++){
            $('<option></option>',{
                text: dates[i].format("YYYY-MM-DD"),
                value : dates[i].format("YYYY-MM-DD")

            }).appendTo('#date');
        }
    });
}
//save in post route, all the values that was obtained on inputs
$('#incidence-save').on('click', function(){
    $.ajax({
        method: 'POST',
        url: url,
        data:{
            //id: made a data-type in html, then pass the attribute to js and this, could named as incidenceId or something like that
            date: $('#date option:selected').text(),
            incidence_type: $('#incidence_type').val(),
            day: $('#date').val(),
            description: $('#description').val(),
            activity: $('#activity').val(),
            _token: token
        }
    })
        .done(function(dt) {
            console.log(dt['date']);
        })
});

//post new incidence



