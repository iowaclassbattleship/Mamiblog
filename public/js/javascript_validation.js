$(document).ready(function() {
    var mailRegex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    $("#email").change(function () {
        var emailValue = $("#email").val();
        if(!emailValue.match(mailRegex)){
            $('#email').parent().css('border-color','red');
        }
    });
});


