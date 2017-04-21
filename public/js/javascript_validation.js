$(document).ready(function() {
    var mailRegex = /^([a-zA-Z]+@[a-zA-Z]{1,})\w+$/;
    var pwdRegex = /^(?=.+[A-Z])(?=.*\d)[A-Za-z\d]{8,}$/;
    /*
        Validierung von E-Mail und Passworteingabe.
        Bei Eingaben die nicht den Richtlinien entsprechen wird das Eingabefeld rot gefärbt.
        Entsprechen sie den Richtlinien werden die Felder grün gefärbt.
     */
    // change color of input field email depending on input matching regex
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

    // change color of input field password depending on input matching regex
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

    // Submit button shall only be clickable when all the inputs have been validated
    // this task is achieved by implementing the JQuery validate() Plugin
    // https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js
    $("#send").attr('disabled','disabled')
    $(':input').keyup(function() {
        try {
            var validator = $("#registration_form").validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 4
                    },
                    email: {
                        required: true,
                        email: true
                    }
                },
                showErrors: function(map, list) {},
                messages: {
                    firstName: "",
                    lastName: "",
                    email: "",
                },
                onkeyup: function (element, e) {
                    if(validator.form())
                        $("#send").removeAttr('disabled');
                }
            });
        }
        // Errors shall be ignored
        // Front End will not notice the discrepancy in the CodeStyle
        catch(err){} //dirty
    });
});


