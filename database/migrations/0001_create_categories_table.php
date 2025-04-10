<?php

return [
    'up' => "CREATE TABLE `categories` (
        `id` VARCHAR(36) NOT NULL,
        `name` VARCHAR(255) NOT NULL,
        `description` TEXT NULL,
        `parent_id` VARCHAR(36) NULL,
        `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`),
        CONSTRAINT `fk_category_parent` 
          FOREIGN KEY (`parent_id`) 
          REFERENCES `categories` (`id`) 
          ON DELETE SET NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4",
    
    'down' => "DROP TABLE `categories`"
];