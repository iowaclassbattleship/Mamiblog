$(document).ready(function() {
    var mailRegex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{1,}))$/;
    var pwdRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
    var submitButton = false;
    var submitButton2 = false;

    /*
        Validierung von E-Mail und Passworteingabe.
        Bei Eingaben die nicht den Richtlinien entsprechen wird das Eingabefeld rot gefärbt.
        Entsprechen sie den Richtlinien werden die Felder grün gefärbt.
     */

    function validateEmail() {
        var emailValue = $('#email').val();
        if(!emailValue.match(mailRegex)){
            $('#email').css('background-color', '#ffcccc');
            submitButton = true;
        }
        else {
            $('#email').css('background-color', '#b3ffb3');
            submitButton = false;
        }
    }

    $('#email').keypress(validateEmail);
    $('#email').change(validateEmail);

    function validatePassword () {
        var passwordValue = $('#password').val();
        if(!passwordValue.match(pwdRegex)){
            $('#password').css('background-color', '#ffcccc');
            submitButton2 = true;
        }
        else {
            $('#password').css('background-color', '#b3ffb3');
            submitButton2 = false;
        }
    }

    $('#password').keypress(validatePassword);
    $('#password').change(validatePassword);



    $(':input[type="submit"]').prop('disabled', true);
    $('#password').change(validateSubmitButton);
    $('#password').change(validateSubmitButton);

    function validateSubmitButton() {

        if ($(submitButton = true) && $(submitButton2 = true)) {
            $(':input[type="submit"]').prop('disabled', false);
        }
        else {
            $(':input[type="submit"]').prop('disabled', true);
        }
    }
});


