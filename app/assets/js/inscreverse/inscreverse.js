$(function () {
    $('#sign_up').validate({
        rules: {
            'terms': {
                required: true
            },
            'confirm': {
                equalTo: '[name="senha"]'
            }
        },
        highlight: function (input) {
            console.log(input);
            $(input).parents('.form-line').addClass('error');
        },
        unhighlight: function (input) {
            $(input).parents('.form-line').removeClass('error');
        },
        errorPlacement: function (error, element) {
            $(element).parents('.input-group').append(error);
            $(element).parents('.form-group').append(error);
        }
    });
});


function login_check(login){
    $.ajax({
        url: URL_BASE + 'login/checar_login/' + login,
        type: 'POST',
        success: function(data) {
            if (data == 1) {
                $("#login-exists").empty();
                $("#login-exists").append('<label id="login-msg" class="error" for="login">This login already exists.</label>');
            } else {
                $("#login-exists").empty();
            }
        }
    });
}

function email_check(email){
    $.ajax({
        url: URL_BASE + 'login/checar_email/' + email,
        type: 'POST',
        success: function(data) {
            if (data == 1) {
                $("#email-exists").empty();
                $("#email-exists").append('<label id="email-msg" class="error" for="email">This email already exists.</label>');
            } else {
                $("#email-exists").empty();
            }
        }
    });
}