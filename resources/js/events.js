document.addEventListener('DOMContentLoaded', () => {
    function showDetails(element) {
        const name = element.getAttribute('data-name');
        const start = element.getAttribute('data-start');
        const diff = element.getAttribute('data-diff');
        const days = element.getAttribute('data-days');
    
        document.getElementById('eventName').textContent = name;
        document.getElementById('eventStart').textContent = start;
        document.getElementById('eventDiff').textContent = diff;
        document.getElementById('eventDays').textContent = days;
    }

    window.showDetails = showDetails;
});