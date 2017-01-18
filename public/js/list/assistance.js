
/**
 * Created by Dalia Pinto on 17/01/2017.
 */
//access to incidence add Modal
$('.dropdown-menu').find('li').find('a').eq(2).on('click', function (){
    console.log(event);
    $('#myModal').modal();
});

/*$('#incidence-save').on('click', function(){
    $.ajax({
        method: 'POST',
        url: url,
        data:{
            body:
        }
    });
});*/


