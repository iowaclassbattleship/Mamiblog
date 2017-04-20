
$(document).ready(function() {

    $('#day_nightmode').click(changeMode);

    function changeMode() {
        $('body').toggleClass('night');
    }
});