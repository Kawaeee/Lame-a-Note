function validate() {
    var username = document.getElementById('username');
    var password = document.getElementById('password');
    var ig_username = document.getElementById('ig_username');
    var ig_password = document.getElementById('ig_password');

    username.setAttribute('onkeyup', 'validate()');
    password.setAttribute('onkeyup', 'validate()');

    var iconUser = document.getElementById('iconUser');
    var iconPass = document.getElementById('iconPass');

    var regexUsername = /^[a-zA-Z0-9 ]{1,50}$/;
    var regexPassword = /^[a-zA-Z0-9 ]{4,16}$/;

    if (username.value !== "") {
        if (username.value.match(regexUsername)) {
            ig_username.style.border = "1px solid #ffffff";
        }
        else {
            ig_username.style.border = "1px solid #ff0000";
        }
    }
    else {
        ig_username.style.border = "1px solid #ff0000";
    }

    if (password.value !== "") {
        if (password.value.match(regexPassword)) {
            ig_password.style.border = "1px solid #ffffff";
        }
        else {
            ig_password.style.border = "1px solid #ff0000";
        }
    }
    else {
        ig_password.style.border = "1px solid #ff0000";
    }
}