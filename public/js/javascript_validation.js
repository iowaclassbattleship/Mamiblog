$(document).ready(function() {
    var mailRegex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var nameRegex = /^[a-zA-Z]+$/;
    var pwdRegex = /^([A-Za-z]{8,})\w+$/;

    $('#firstName').keyup(function () {
       var firstNameValue = $('#firstName').val();
        if(!firstNameValue.match(nameRegex)){
            $('#firstName').css('background-color', '#ffcccc');
        }
        else {
            $('#firstName').css('background-color', '#b3ffb3');
        }
    });

    $('#lastName').keyup(function () {
        var firstNameValue = $('#lastName').val();
        if(!firstNameValue.match(nameRegex)){
            $('#lastName').css('background-color', '#ffcccc');
        }
        else {
            $('#lastName').css('background-color', '#b3ffb3');
        }
    });

    $('#email').keyup(function () {
        var emailValue = $('#email').val();
        if(!emailValue.match(mailRegex)){
            $('#email').css('background-color', '#ffcccc');
        }
        else {
            $('#email').css('background-color', '#b3ffb3');
        }
    });

    $('#password').keyup(function () {
        var passwordValue = $('#password').val();
        if(!passwordValue.match(pwdRegex)){
            $('#password').css('background-color', '#ffcccc');
        }
        else {
            $('#password').css('background-color', '#b3ffb3');
        }
    });
});


