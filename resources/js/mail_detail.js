document.addEventListener('DOMContentLoaded', () => {
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
});