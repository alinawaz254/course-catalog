<?php

return [
    'up' => "CREATE TABLE `courses` (
        `id` VARCHAR(36) NOT NULL,
        `title` VARCHAR(255) NOT NULL,
        `description` TEXT NULL,
        `image_preview` VARCHAR(255) NULL,
        `category_id` VARCHAR(36) NOT NULL,
        `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`),
        CONSTRAINT `fk_course_category` 
          FOREIGN KEY (`category_id`) 
          REFERENCES `categories` (`id`) 
          ON DELETE CASCADE
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4",
    
    'down' => "DROP TABLE `courses`"
];