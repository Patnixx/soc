document.addEventListener('DOMContentLoaded', () => {
    function showDetails(element) {
        const name = element.getAttribute('data-name');
        const start = element.getAttribute('data-start');
        const diff = element.getAttribute('data-diff');
        const courseName = element.getAttribute('data-course-name');
        const courseClass = element.getAttribute('data-course-class');
        const courseLength = element.getAttribute('data-course-length');
        const courseSeason = element.getAttribute('data-course-season');
    
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
    }

    window.showDetails = showDetails;
});