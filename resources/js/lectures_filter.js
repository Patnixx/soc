document.addEventListener('DOMContentLoaded', () => {
    const filterButtons = document.querySelectorAll('.filter-btn');
    const lectureCards = document.querySelectorAll('.lecture-card');

    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Remove 'active' class from all buttons
            filterButtons.forEach(btn => btn.classList.remove('bg-m-purple', 'dark:bg-m-purple', 'text-white', 'dark:text-white'));
            
            // Highlight the clicked button
            button.classList.add('bg-m-purple', 'dark:bg-m-purple', 'text-white', 'dark:text-white');

            // Get the role to filter
            const role = button.getAttribute('data-role');

            // Show/Hide Users based on the role
            lectureCards.forEach(card => {
                const userRole = card.getAttribute('data-role');

                if (role === 'All' || userRole === role) {
                    card.classList.remove('hidden', 'text-yellow-500');
                    if (role !== 'All') card.classList.add('text-yellow-500');
                } else {
                    card.classList.add('hidden');
                    card.classList.remove('text-yellow-500');
                }
            });
        });
    });
});