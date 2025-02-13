<!-- Very little is needed to make a happy life. - Marcus Aurelius -->
<div class="dark:bg-gray-800 bg-m-blue hover:bg-m-red dark:hover:bg-m-darkblue relative flex items-center justify-center h-12 w-12 mt-2 mb-2 mx-auto rounded-3xl hover:rounded-xl shadow-lg transition-all duration-300 ease-linear group cursor-default">
    <i class="bi bi-sun text-xl sun group-hover:text-white text-m-blue ransition-all duration-300 ease-linear cursor-pointer"></i>
    <i class="bi bi-moon-stars text-xl moon group-hover:text-white text-gray-900 transition-all duration-300 ease-linear cursor-pointer dark:group-hover:bg-gray-900"></i>
    <span class="hidden sm:block absolute w-auto p-2 m-2 min-w-max {{$spanSide}} rounded-md shadow-md text-white bg-gray-900 text-xs font-bold transition-all duration-100 scale-0 origin-left group-hover:scale-100">
        {{__('sidebar.theme')}}
    </span>
</div>
<script>
    const sunIcon = document.querySelector(".sun");
        const moonIcon = document.querySelector(".moon");
    
        // Theme vars
        const userTheme = localStorage.getItem("theme");
        const systemTheme = window.matchMedia("(prefers-color-scheme: dark)").matches;
    
        // Icon toggling
        const iconToggle = () => {
            moonIcon.classList.toggle("display-none");
            sunIcon.classList.toggle("display-none");
        };
    
        // Init theme check
        const themeCheck = () => {
            if (userTheme === "dark" || (!userTheme && systemTheme)) {
                document.documentElement.classList.add("dark");
                moonIcon.classList.add("display-none");
                return;
            }
            sunIcon.classList.add("display-none");
        };
    
        // Manual theme switch
        const themeSwitch = () => {
            if (document.documentElement.classList.contains("dark")) {
                document.documentElement.classList.remove("dark");
                localStorage.setItem("theme", "light");
                iconToggle();
                return;
            }
            document.documentElement.classList.add("dark");
            localStorage.setItem("theme", "dark");
            iconToggle();
        };
    
        // Call theme switch on button click
        sunIcon.addEventListener("click", () => {
            themeSwitch();
        });
    
        moonIcon.addEventListener("click", () => {
            themeSwitch();
        });
    
        // Theme check on init load
        themeCheck();
</script>