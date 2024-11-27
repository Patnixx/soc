<!-- People find pleasure in different ways. I find it in keeping my mind clear. - Marcus Aurelius -->
<div 
    class="relative flex items-center justify-center h-12 w-12 mt-2 mb-2 mx-auto shadow-lg bg-gray-800 text-m-blue hover:bg-m-darkblue hover:text-white rounded-3xl hover:rounded-xl transition-all duration-300 ease-linear group cursor-pointer"
    onclick="toggleLogoutConfirmation(event)"
>
    <i class="{{$icon}} text-xl"></i>
    
    <!-- Logout confirmation tooltip -->
    <span 
        id="logout-tooltip"
        class="absolute w-auto p-4 m-2 min-w-max left-14 rounded-md shadow-md text-white bg-gray-900 text-xs font-bold transition-all duration-100 scale-0 origin-left group-active:scale-100"
    >
        Do you really want to log out?
        <div class="flex gap-2 mt-2">
            <a href="{{$route}}" class="bg-red-600 hover:bg-red-700 text-white px-2 py-1 rounded-md">Yes</a>
            <a href="#" class="bg-gray-600 hover:bg-gray-700 text-white px-2 py-1 rounded-md" onclick="event.stopPropagation(); toggleLogoutConfirmation(event, false);">No</a>
        </div>
    </span>
</div>

<script>
    function toggleLogoutConfirmation(event, show = true) {
        event.stopPropagation();
        const tooltip = event.currentTarget.querySelector("#logout-tooltip");
        if (tooltip) {
            tooltip.style.transform = show ? "scale(1)" : "scale(0)";
        }
    }

    // Ensure the tooltip closes when clicking outside the component
    document.addEventListener("click", (e) => {
        const activeTooltip = document.querySelector("#logout-tooltip");
        if (activeTooltip && activeTooltip.style.transform === "scale(1)") {
            activeTooltip.style.transform = "scale(0)";
        }
    });
</script>
