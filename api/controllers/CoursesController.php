<?php

require_once __DIR__ . '/../models/Course.php';

class CoursesController {
    public function index() {
        header('Content-Type: application/json');
        $course = new Course();
        echo json_encode($course->getAll());
    }

    public function show($id) {
        header('Content-Type: application/json');
        $course = new Course();
        $courseData = $course->getById($id);
        
        if ($courseData) {
            echo json_encode($courseData);
        } else {
            header("HTTP/1.0 404 Not Found");
            echo json_encode(['error' => 'Course not found']);
        }
    }
}