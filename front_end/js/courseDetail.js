document.addEventListener('DOMContentLoaded', async () => {
    const urlParams = new URLSearchParams(window.location.search);
    const courseId = urlParams.get('id');

    if (courseId) {
        try {
            const course = await ApiService.getCourseById(courseId);
            Components.renderCourseDetails(course);
        } catch (error) {
            console.error('Error loading course details:', error);
            document.getElementById('course-details').innerHTML = `
                <div class="error-message">
                    <p>Error loading course details. Please try again later.</p>
                    <a href="/">← Back to Courses</a>
                </div>
            `;
        }
    } else {
        window.location.href = '/';
    }
});