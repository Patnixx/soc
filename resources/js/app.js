/*import './bootstrap';
import './auth.js';
import './theme.js';
import './users_filter.js';
import './pass_strength.js';
import './events.js';
import './mail_detail.js';
import './lecture_sidebar_filter.js';
import './lectures_filter.js';
import './previewPfp.js';
import './carsCarousel.js'; */
import axios from 'axios';

document.addEventListener("DOMContentLoaded", () => {
    //!bootstrap
    window.axios = axios;
    window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

    //!password visibility
    function togglePasswordVisibility(inputId, icon) {
        let input = document.getElementById(inputId);
        if (input.type === "password") {
            input.type = "text";
            icon.classList.replace("bi-eye-slash", "bi-eye");
        } else {
            input.type = "password";
            icon.classList.replace("bi-eye", "bi-eye-slash");
        }
    }
    window.togglePasswordVisibility = togglePasswordVisibility; 
    
    //!cars carousel
    function moveCarousel(carIndex, direction) {
        const carousel = document.querySelectorAll('.carousel')[carIndex];
        const items = carousel.querySelectorAll('.carousel-item');
        let currentIndex = [...items].findIndex(item => item.classList.contains('block'));

        items[currentIndex].classList.remove('block');
        items[currentIndex].classList.add('hidden');

        const nextIndex = (currentIndex + direction + items.length) % items.length;
        items[nextIndex].classList.remove('hidden');
        items[nextIndex].classList.add('block');
    }

    window.moveCarousel = moveCarousel;

    //!event details
    function showDetails(element) {
        const id = element.getAttribute('data-id');
        const name = element.getAttribute('data-name');
        const start = element.getAttribute('data-start');
        const diff = element.getAttribute('data-diff');
        const courseName = element.getAttribute('data-course-name');
        const courseClass = element.getAttribute('data-course-class');
        const courseLength = element.getAttribute('data-course-length');
        const courseSeason = element.getAttribute('data-course-season');
        const btns = document.getElementById('btns');
        const editHref = document.getElementById('editHref');
    
        document.getElementById('eventName').textContent = name;

        document.getElementById('eventStart').textContent = start;
        document.getElementById('eventStartID').classList.remove('hidden');
        document.getElementById('eventDiff').textContent = diff;

        document.getElementById('eventDiffID').classList.remove('hidden');

        document.getElementById('eventCourseName').textContent = courseName;
        document.getElementById('eventCourseNameID').classList.remove('hidden');

        document.getElementById('eventCourseClass').textContent = courseClass;
        document.getElementById('eventCourseClassID').classList.remove('hidden');

        document.getElementById('eventCourseLength').textContent = courseLength;
        document.getElementById('eventCourseLengthID').classList.remove('hidden');

        document.getElementById('eventCourseSeason').textContent = courseSeason;
        document.getElementById('eventCourseSeasonID').classList.remove('hidden');

        editHref.href = `/events/${id}/edit`;
        btns.classList.remove('hidden');
        btns.classList.add('flex');

    }

    window.showDetails = showDetails;

    //!lecture dropdowns
    function initializeDropdowns() {
        const dropdownButtons = document.querySelectorAll('[data-dropdown-button]');
        const dropdownContents = document.querySelectorAll('[data-dropdown-content]');
    
        dropdownButtons.forEach((button) => {
            button.addEventListener('click', () => {
                const targetContentId = button.dataset.target;
    
                dropdownContents.forEach((content) => {
                    content.classList.add('hidden');
                });
    
                const targetContent = document.querySelector(`[data-content-id="${targetContentId}"]`);
                if (targetContent) {
                    targetContent.classList.remove('hidden');
                }
            });
        });
    }
    window.initializeDropdowns = initializeDropdowns;
    window.initializeDropdowns();

    //!lecture filter
    function initializeFilter() {
        const filterButtons = document.querySelectorAll('.filter-btn');
        const lectureCards = document.querySelectorAll('.lecture-card');
    
        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                filterButtons.forEach(btn => btn.classList.remove('bg-m-purple', 'dark:bg-m-purple', 'text-white', 'dark:text-white'));
                button.classList.add('bg-m-purple', 'dark:bg-m-purple', 'text-white', 'dark:text-white');
    
                const rank = button.getAttribute('data-rank');
                lectureCards.forEach(card => {
                    const themeRank = card.getAttribute('data-rank');
    
                    if (rank === 'All' || themeRank === rank) {
                        card.classList.remove('hidden', 'text-yellow-500');
                        if (rank !== 'All') card.classList.add('text-yellow-500');
                    } else {
                        card.classList.add('hidden');
                        card.classList.remove('text-yellow-500');
                    }
                })
            });
        });
    }

    window.initializeFilter = initializeFilter;
    window.initializeFilter();

    //!mail details
    function showMail(element){
        const sender = element.getAttribute('data-sender');
        const title = element.getAttribute('data-title');
        const content = element.getAttribute('data-content');
        const time = element.getAttribute('data-time');

        document.getElementById('mailContent').textContent = content;
        document.getElementById('mailTitle').textContent = title;
        document.getElementById('mailSender').textContent = sender;
        document.getElementById('mailDate').textContent = time;

        document.getElementById('activeMail').classList.remove('hidden');

        document.getElementById('closeMail').addEventListener('click', function() {
            const activeMail = document.getElementById('activeMail');
            activeMail.classList.add('hidden'); // Hides the mail div
        });
    }

    window.showMail = showMail;

    //!password strength
    function initializePasswordStrength() {
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
                { text: "Sila hesla", color_bg: "bg-m-blue", color_txt: "text-m-blue", width: "0%" },
                { text: "Veľmi slabé", color_bg: "bg-red-500", color_txt: "text-red-500", width: "20%" },
                { text: "Slabé", color_bg: "bg-orange-500", color_txt: "text-orange-400", width: "40%" },
                { text: "Dobré", color_bg: "bg-yellow-500", color_txt: "text-yellow-500", width: "60%" },
                { text: "Silné", color_bg: "bg-green-400", color_txt: "text-green-400", width: "80%" },
                { text: "Veľmi silné", color_bg: "bg-green-500", color_txt: "text-green-500", width: "100%" },
            ];
    
            const { text, color_bg, color_txt, width } = levels[strength];
    
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
    }
    window.initializePasswordStrength = initializePasswordStrength;
    window.initializePasswordStrength();

    //!profile picture preview
    function previewImage(event) {
        const file = event.target.files[0]; // Get the uploaded file
        const reader = new FileReader(); // Create a new FileReader instance
        const fileNameSpan = document.getElementById('fileName'); // Get the span element that displays the file name
        
        reader.onload = function(e) {
            const imageUrl = e.target.result; // The file content (image URL)
            const imgElement = document.getElementById('profilePicture'); // Get the image element
            imgElement.src = imageUrl; // Update the image source to the uploaded image
        };
    
        if (file) {
            reader.readAsDataURL(file); // Read the uploaded file as a Data URL
            fileNameSpan.textContent = file.name; // Display the file name
        }
    }
    
    window.previewImage = previewImage;
});