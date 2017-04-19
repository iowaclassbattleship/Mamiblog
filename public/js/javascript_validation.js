$(document).ready(function() {
    var mailRegex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{1,}))$/;
    var pwdRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;

    /*
        Validierung von E-Mail und Passworteingabe.
        Bei Eingaben die nicht den Richtlinien entsprechen wird das Eingabefeld rot gefärbt.
        Entsprechen sie den Richtlinien werden die Felder grün gefärbt.
     */

    function validateEmail() {
        var emailValue = $('#email').val();
        if(!emailValue.match(mailRegex)){
            $('#email').css('background-color', '#ffcccc');
        }
        else {
            $('#email').css('background-color', '#b3ffb3');
        }
    }

    $('#email').keypress(validateEmail);
    $('#email').change(validateEmail);

    function validatePassword () {
        var passwordValue = $('#password').val();
        if(!passwordValue.match(pwdRegex)){
            $('#password').css('background-color', '#ffcccc');
        }
        else {
            $('#password').css('background-color', '#b3ffb3');
        }
    }

    $('#password').keypress(validatePassword);
    $('#password').change(validatePassword);
});


