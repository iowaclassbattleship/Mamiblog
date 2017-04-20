$(document).ready(function() {
    var mailRegex = /^(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])$/;
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

    $('#email').keyup(validateEmail);
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

    $('#password').keyup(validatePassword);
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


