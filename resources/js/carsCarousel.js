document.addEventListener('DOMContentLoaded', () => {
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
});