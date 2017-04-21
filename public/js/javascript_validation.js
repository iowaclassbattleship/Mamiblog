$(document).ready(function() {
    var mailRegex = /^(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])$/;
    var pwdRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;

    /*
        Validierung von E-Mail und Passworteingabe.
        Bei Eingaben die nicht den Richtlinien entsprechen wird das Eingabefeld rot gefärbt.
        Entsprechen sie den Richtlinien werden die Felder grün gefärbt.
     */



    $('#email').keydown(validateEmail);
    $('#email').keyup(validateEmail);
    $('#email').change(validateEmail);

    function validateEmail() {
        var emailValue = $('#email').val();
        if(!emailValue.match(mailRegex)){
            $('#email').css('background-color', '#ffcccc');
        }
        else {
            $('#email').css('background-color', '#b3ffb3');
        }
    }

    $('#password').keydown(validatePassword);
    $('#password').keyup(validatePassword);
    $('#password').change(validatePassword);

    function validatePassword () {
        var passwordValue = $('#password').val();
        if(!passwordValue.match(pwdRegex)){
            $('#password').css('background-color', '#ffcccc');
        }
        else {
            $('#password').css('background-color', '#b3ffb3');
        }
    }


});


