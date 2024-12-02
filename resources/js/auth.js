function showPass() {
    var pass = document.getElementById('password');
    var pass_text = document.getElementById('show_pass_txt');
    if (pass.type === 'password') {
        pass.type = 'text';
        pass_text.innerHTML = 'Hide Password';
    } else {
        pass.type = 'password';
        pass_text.innerHTML = 'Show Password';
    }
}