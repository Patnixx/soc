document.addEventListener("DOMContentLoaded", () => {
    function showPass() {
        var pass = document.getElementById('pass');
        var text = document.getElementById('show_pass_txt');
        if (pass.type === 'password') {
            pass.type = 'text';
            text.textContent="Zakryť heslo";
        } else {
            pass.type = 'password';
            text.textContent="Odkryť heslo";
        }
    }

    window.showPass = showPass;
});