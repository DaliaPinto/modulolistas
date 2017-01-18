
/**
 * Created by Dalia Pinto on 17/01/2017.
 */
//access to create incidence Modal
$('.dropdown-menu').find('li').find('a').eq(2).on('click', function (){
    console.log(event);
    $('#myModal').modal();
});
/**
 *onload dates in select
 */
function selectIncidence(days, dates){
    console.log('days '  + days);
    console.log(dates);
    $('#incidence-date').load(function(){
    });
}
//save in post route, all the values that was obtained in inputs
$('#incidence-save').on('click', function(){
    $.ajax({
        method: 'POST',
        url: url,
        data:{
            //id: made a data-type in html, then pass the attribute to js and this, could named as incidenceId or something like that
            date: $('#incidence-date option:selected').text(),
            type: $('#incidence-type').val(),
            day: $('#incidence-date').val(),
            description: $('#incidence-description').val(),
            activity: $('#incidence-activity').val(),
            _token: token
        }
    })
        .done(function(dt) {
            console.log(dt['date']);
        })
});


