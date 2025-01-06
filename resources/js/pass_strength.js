document.addEventListener("DOMContentLoaded", () => {
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
            { text: "", color: "-gray-200", width: "0%" },
            { text: "Weak", color: "-red-500", width: "20%" },
            { text: "Fair", color: "-yellow-400", width: "40%" },
            { text: "Moderate", color: "-yellow-500", width: "60%" },
            { text: "Strong", color: "-green-400", width: "80%" },
            { text: "Very Strong", color: "-green-500", width: "100%" },
        ];

        const { text, color, width } = levels[strength];

        strengthBar.className = `h-full bg${color} rounded-full transition-all`;
        strengthBar.style.width = width;

        strengthText.textContent = text;
        strengthText.className = `text-sm mt-2 text${color}`;
    };

    passwordInput.addEventListener("input", (e) => {
        const password = e.target.value;
        const strength = evaluateStrength(password);
        updateStrengthDisplay(strength);
    });
});