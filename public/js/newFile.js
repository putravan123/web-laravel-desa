document.addEventListener("DOMContentLoaded", function () {
    const togglePasswordPassword = document.getElementById(
        "togglePasswordPassword"
    );
    const passwordField = document.getElementById("password");
    const togglePasswordConfirmation = document.getElementById(
        "togglePasswordConfirmation"
    );
    const passwordConfirmationField = document.getElementById(
        "password_confirmation"
    );

    if (togglePasswordPassword) {
        togglePasswordPassword.addEventListener("click", function () {
            if (passwordField.type === "password") {
                passwordField.type = "text";
                this.querySelector("i").classList.remove("fa-lock");
                this.querySelector("i").classList.add("fa-lock-open");
            } else {
                passwordField.type = "password";
                this.querySelector("i").classList.remove("fa-lock-open");
                this.querySelector("i").classList.add("fa-lock");
            }
        });
    }

    if (togglePasswordConfirmation) {
        togglePasswordConfirmation.addEventListener("click", function () {
            if (passwordConfirmationField.type === "password") {
                passwordConfirmationField.type = "text";
                this.querySelector("i").classList.remove("fa-lock");
                this.querySelector("i").classList.add("fa-lock-open");
            } else {
                passwordConfirmationField.type = "password";
                this.querySelector("i").classList.remove("fa-lock-open");
                this.querySelector("i").classList.add("fa-lock");
            }
        });
    }
});


//Login

document.addEventListener('DOMContentLoaded', function () {
    const togglePassword = document.getElementById('togglePassword');
    const passwordField = document.getElementById('password');
    
    if (togglePassword) {
        togglePassword.addEventListener('click', function () {
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                this.querySelector('i').classList.remove('fa-lock');
                this.querySelector('i').classList.add('fa-lock-open');
            } else {
                passwordField.type = 'password';
                this.querySelector('i').classList.remove('fa-lock-open');
                this.querySelector('i').classList.add('fa-lock');
            }
        });
    }
});