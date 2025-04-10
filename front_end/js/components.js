const Components = {
    renderCategoryList: (container, categories) => {
        const ul = document.createElement('ul');
        ul.className = 'category-list';

        // Add "All Courses" option
        const allLi = document.createElement('li');
        allLi.className = 'category-item active';
        allLi.innerHTML = '<a href="/">All Courses</a>';
        ul.appendChild(allLi);

        categories.forEach(category => {
            const li = document.createElement('li');
            li.className = 'category-item';
            li.innerHTML = `<a href="#" data-id="${category.id}">${category.name} (${category.course_count})</a>`;
            ul.appendChild(li);
        });

        container.innerHTML = '';
        container.appendChild(ul);
    },

    renderCourseList: (container, courses) => {
        container.innerHTML = '';

        courses.forEach(course => {
            const card = document.createElement('a');
            card.className = 'course-card';
            card.href = `course.html?id=${course.id}`;

            const image = document.createElement('img');
            image.src = course.image_preview;
            image.alt = course.title;
            image.className = 'course-image-thumb';

            const title = document.createElement('h3');
            title.className = 'course-title';
            title.textContent = course.title;

            const description = document.createElement('p');
            description.className = 'course-description';
            description.textContent = course.description;

            const category = document.createElement('div');
            category.className = 'course-category';
            category.textContent = course.category_name;

            card.appendChild(image);
            card.appendChild(title);
            card.appendChild(description);
            card.appendChild(category);
            container.appendChild(card);
        });
    },

    renderCourseDetails: (course) => {
        const container = document.getElementById('course-details');
        container.innerHTML = '';

        const image = document.createElement('img');
        image.src = course.image_preview || 'assets/default-course.jpg';
        image.alt = course.title;
        image.className = 'course-detail-image';

        const title = document.createElement('h1');
        title.className = 'course-detail-title';
        title.textContent = course.title;

        const meta = document.createElement('div');
        meta.className = 'course-detail-meta';
        meta.innerHTML = `
            <div><strong>Category:</strong> ${course.category_name}</div>
        `;

        const description = document.createElement('div');
        description.className = 'course-detail-description';
        description.textContent = course.description;

        container.appendChild(image);
        container.appendChild(title);
        container.appendChild(meta);
        container.appendChild(description);
    }
};