document.addEventListener('DOMContentLoaded', async () => {
    const categoryListContainer = document.getElementById('category-list');
    const courseListContainer = document.getElementById('course-list');

    // Load initial data
    try {
        const [categories, courses] = await Promise.all([
            ApiService.getCategories(),
            ApiService.getCourses()
        ]);

        Components.renderCategoryList(categoryListContainer, categories);
        Components.renderCourseList(courseListContainer, courses);
    } catch (error) {
        console.error('Error loading data:', error);
    }

    // Handle category selection
    categoryListContainer.addEventListener('click', async (e) => {
        if (e.target.tagName === 'A' && e.target.dataset.id) {
            e.preventDefault();
            
            // Update active state
            document.querySelectorAll('.category-item a').forEach(item => {
                item.classList.remove('active');
            });
            e.target.classList.add('active');

            // Load courses
            try {
                const categoryId = e.target.dataset.id;
                const courses = await ApiService.getCoursesByCategory(categoryId);
                Components.renderCourseList(courseListContainer, courses);
            } catch (error) {
                console.error('Error loading courses:', error);
            }
        }
    });
});