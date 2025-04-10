<?php

class Category {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM categories");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getWithCourseCounts() {
        $query = "
            SELECT 
                c.id, 
                c.name, 
                c.parent_id,
                COUNT(co.id) as course_count
            FROM 
                categories c
            LEFT JOIN 
                courses co ON co.category_id = c.id OR 
                            co.category_id IN (SELECT id FROM categories WHERE parent_id = c.id) OR
                            co.category_id IN (SELECT id FROM categories WHERE parent_id IN 
                                (SELECT id FROM categories WHERE parent_id = c.id))
            GROUP BY 
                c.id
        ";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCoursesByCategory($categoryId) {
        $query = "
            SELECT 
                co.*,
                c.name as category_name
            FROM 
                courses co
            JOIN 
                categories c ON co.category_id = c.id
            WHERE 
                co.category_id = :category_id OR
                co.category_id IN (SELECT id FROM categories WHERE parent_id = :category_id) OR
                co.category_id IN (SELECT id FROM categories WHERE parent_id IN 
                    (SELECT id FROM categories WHERE parent_id = :category_id))
        ";
        $stmt = $this->db->prepare($query);
        $stmt->execute([':category_id' => $categoryId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}