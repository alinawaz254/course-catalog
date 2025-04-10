const API_BASE = 'http://localhost/course-catalog-new/api/public';

const ApiService = {
    getCourses: async () => {
        const response = await fetch(`${API_BASE}/courses`);
        return await response.json();
    },

    getCourseById: async (id) => {
        const response = await fetch(`${API_BASE}/courses/${id}`);
        return await response.json();
    },

    getCategories: async () => {
        const response = await fetch(`${API_BASE}/categories`);
        return await response.json();
    },

    getCoursesByCategory: async (categoryId) => {
        const response = await fetch(`${API_BASE}/categories/${categoryId}/courses`);
        return await response.json();
    }
};