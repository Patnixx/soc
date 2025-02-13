/*document.addEventListener("DOMContentLoaded", () => {
    const passwordInput = document.getElementById("password");
    const strengthBar = document.getElementById("strength-level");
    const strengthText = document.getElementById("strength-text");

    const evaluateStrength = (password) => {
        let strength = 0;
        const strengthCriteria = [
            /[a-z]/, // Lowercase letters
            /[A-Z]/, // Uppercase letters
            /\d/,    // Numbers
            /[@$!%*?&#]/, // Special characters
            /.{8,}/, // Minimum length
        ];

        strengthCriteria.forEach((regex) => {
            if (regex.test(password)) strength++;
        });

        return strength;
    };

    const updateStrengthDisplay = (strength) => {
        const levels = [
            { text: "Sila hesla" ,color_bg: "bg-m-blue", color_txt: "text-m-blue" ,width: "0%" },
            { text: "Veľmi slabé", color_bg: "bg-red-500", color_txt: "text-red-500" ,width: "20%" },
            { text: "Slabé", color_bg: "bg-orange-500", color_txt: "text-orange-400" ,width: "40%" },
            { text: "Dobré", color_bg: "bg-yellow-500", color_txt: "text-yellow-500" ,width: "60%" },
            { text: "Silné", color_bg: "bg-green-400", color_txt: "text-green-400" ,width: "80%" },
            { text: "Veľmi silné", color_bg: "bg-green-500", color_txt: "text-green-500" ,width: "100%" },
        ];

        const { text, color_bg, color_txt ,width } = levels[strength];

        strengthBar.className = `h-full ${color_bg} rounded-full transition-all`;
        strengthBar.style.width = width;

        strengthText.textContent = text;
        strengthText.className = `text-sm mt-2 ${color_txt}`;
    };

    passwordInput.addEventListener("input", (e) => {
        const password = e.target.value;
        const strength = evaluateStrength(password);
        updateStrengthDisplay(strength);
    });
}); */