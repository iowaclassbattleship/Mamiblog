$('#day_nightmode').change(changeMode);

function changeMode() {
    if($('#day_nightmode').is(':checked')) {
        $('body').addClass('night');
    }

    else {
        $('body').removeClass('night');
    }
}
