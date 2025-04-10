<?php

require_once __DIR__ . '/../models/Category.php';

class CategoriesController {
    public function index() {
        header('Content-Type: application/json');
        $category = new Category();
        echo json_encode($category->getWithCourseCounts());
    }

    public function courses($categoryId) {
        header('Content-Type: application/json');
        $category = new Category();
        echo json_encode($category->getCoursesByCategory($categoryId));
    }
}