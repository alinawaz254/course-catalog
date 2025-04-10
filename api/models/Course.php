<?php

class Course {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function getAll() {
        $query = "
            SELECT 
                c.*,
                cat.name as category_name
            FROM 
                courses c
            JOIN 
                categories cat ON c.category_id = cat.id
        ";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $query = "
            SELECT 
                c.*,
                cat.name as category_name
            FROM 
                courses c
            JOIN 
                categories cat ON c.category_id = cat.id
            WHERE 
                c.id = :id
        ";
        $stmt = $this->db->prepare($query);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}