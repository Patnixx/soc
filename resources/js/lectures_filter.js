/*document.addEventListener('DOMContentLoaded', () => {
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
}); */