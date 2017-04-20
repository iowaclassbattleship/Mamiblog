
$(document).ready(function() {

    $('body').addClass('notransition');

    if($.cookie("isNight") == "true")
        $('body').addClass('night');




    $('#day_nightmode').click(changeMode);

    function changeMode() {
        $('body').removeClass('notransition');
        $('body').toggleClass('night');
        $.cookie("isNight", $('body').hasClass('night'));
    }
});