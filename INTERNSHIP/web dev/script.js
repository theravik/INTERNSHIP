function togglePasswordVisibility() {
    var passwordInput = document.getElementById('pass');
    var eyeIcon = document.getElementById('eyeIcon');
    
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        eyeIcon.innerHTML = '&#128065;'; // Change the eye icon if necessary
    } else {
        passwordInput.type = 'password';
        eyeIcon.innerHTML = 'Show'; // Change the eye icon if necessary
    }
}
