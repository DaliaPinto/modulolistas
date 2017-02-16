$(document).ready(function () {
    routie('*', function () {
        var url = window.location.href;
        var p = url.indexOf('#');
        if (p > -1) {
            var controllerAction = url.substr(url.indexOf('#') + 1);
            var pos = controllerAction.indexOf('*');
            var menu = controllerAction;
            if (pos > -1)
                menu = controllerAction.substr(0, pos);
            activeMenu("nav_" + menu.replace('/', '_'));
            ajaxLoad(controllerAction.replace('*', '/'));
        } else {
            activeMenu("nav_home");
            ajaxLoad('home');
        }
    });
    function activeMenu(nav) {
        $('.nav li.active').removeClass('active');
        $(".nav ." + nav).addClass('active');
    }
});
function ajaxLoad(filename, content) {
    content = typeof content !== 'undefined' ? content : 'content';
    $('.loading').show();
    $.ajax({
        type: "GET",
        url: filename,
        contentType: false,
        success: function (data) {
            $("#" + content).html(data);
            $('.loading').hide();
        },
        error: function (xhr, status, error) {
            alert(xhr.responseText);
        }
    });
}
