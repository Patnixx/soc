/*document.addEventListener('DOMContentLoaded', () => {
    const dropdownButtons = document.querySelectorAll('[data-dropdown-button]'); // Buttons in dropdown
    const dropdownContents = document.querySelectorAll('[data-dropdown-content]'); // Corresponding content

    dropdownButtons.forEach((button) => {
        button.addEventListener('click', () => {
            const targetContentId = button.dataset.target; // The ID of the content to show

            // Hide all dropdown contents
            dropdownContents.forEach((content) => {
                content.classList.add('hidden');
            });

            // Show the selected content
            const targetContent = document.querySelector(`[data-content-id="${targetContentId}"]`);
            if (targetContent) {
                targetContent.classList.remove('hidden');
            }
        });
    });
}); */
