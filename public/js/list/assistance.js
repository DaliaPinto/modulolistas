/**
 * fileoverview: assistance.js contains all the CRUD in
 * attendance model, and incidence model, and details
 * in incidence.create.blade view
 * Author: Dalia Patricia Pinto Islas
 * 2017-17-01
 */

//access to create incidence Modal
$('#new-incidence').on('click', function (){
    $('#myModal').modal();
});
/**
 *onload dates in select
 */
function selectIncidence(dates){
    var dt = "";
    for(var i = 0; i<dates.length; i++){
        dt = moment(new Date(dates[i].date));
        $('#date').append('<option value="'+dt.format("YYYY-MM-DD")+'">'+ dt.format("D MMMM YYYY")+" - "+ dt.format("dddd").toUpperCase()+'</option>');
    }
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
$('#save-incidence').click(function () {
    $('#form-create-incidence').submit();
});


$('#form-create-incidence').validate({
    errorClass: "alert alert-danger",
    errorElement: "div",
    rules: {
        date:{
            required: true
        },
        incidence_type: {
            required: true
        },
        description: {
            required: false
        },
        activity: {
            required: false
        }
    },
    submitHandler: function(form) {
        console.log('form: ' + form);
        $('#save-incidence').prop('disabled', true);
        var data = $(form).serializeArray(); console.log('data: '+ data);
        $.ajax({
            method: 'post',
            url: urlIncidence,
            data: data
        }).done(function(response){
            console.log('response: ' +response);
            var $form = $('#form-create-incidence');
            console.log('url: ' +urlIncidence);
            if(response.status === 0)
            {
                $form.prepend('<div class="alert alert-success" role="alert" id="msg-success"><i class="fa fa-exclamation-circle"></i> ' +
                    'Reporte de Incidencia Generado</div>');

                $('#incidence_type, #description, #activity').val('');
                $('#save-incidence').prop('disabled', false);
                $('#myModal').on('click', function () {
                    $('#msg-success').hide('3000');
                });
            }
            else
            {
                $form.append('<div class="alert alert-danger" role="alert"><i class="fa fa-exclamation-circle"></i> ' +
                    'No se pudo añadir la incidencia.</div>');
            }
        });
    }
});

function obtainValue(element, dates, data){
    for(var i=0;i<data.length;i++){
        for(var j=0;j<data[i].hours.length;j++){
            var curDate = moment(new Date());
            var dateAttendance = moment(new Date(dates));
            var assistance = element.value;
            var parent = element.parentNode.parentNode.parentNode;
            var idStudent = parent.children[1].innerText;
            var ids = data[i].hours[j].id;


            console.log('date: '+dateAttendance.format('YYYY-MM-DD'));
            console.log('student-id: '+idStudent);
            console.log('status-attendance: '+assistance);
            console.log('hours_id: '+ids);
            console.log('created_at: '+ curDate.format('YYYY-MM-DD'));
            console.log('updated_at: '+ curDate.format('YYYY-MM-DD'));
            console.log('*****');
        }
    }
}

