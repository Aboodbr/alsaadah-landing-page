<?php
// app/Models/Product.php

class Product {
    public static function getAll($pdo) {
        try {
            $stmt = $pdo->query("
                SELECT p.*, c.slug as category_slug, c.name_ar as cat_ar, c.name_en as cat_en
                FROM products p
                JOIN categories c ON p.category_id = c.id
                ORDER BY p.id ASC
            ");
            return $stmt->fetchAll();
        } catch (\PDOException $e) {
            return [];
        }
    }

    public static function getFeatured($pdo, $limit = 4) {
        try {
            $stmt = $pdo->prepare("
                SELECT p.*, c.name_ar as cat_ar, c.name_en as cat_en
                FROM products p
                JOIN categories c ON p.category_id = c.id
                WHERE p.image_path IS NOT NULL AND p.image_path != ''
                LIMIT ?
            ");
            $stmt->bindValue(1, (int)$limit, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\PDOException $e) {
            return [];
        }
    }

    public static function getById($pdo, $id) {
        try {
            $stmt = $pdo->prepare("
                SELECT p.*, c.name_ar as cat_name_ar, c.name_en as cat_name_en, c.slug as cat_slug
                FROM products p
                JOIN categories c ON p.category_id = c.id
                WHERE p.id = ?
            ");
            $stmt->execute([(int)$id]);
            return $stmt->fetch();
        } catch (\PDOException $e) {
            return null;
        }
    }

    public static function getPackaging($pdo, $productId) {
        try {
            $stmt = $pdo->prepare("SELECT * FROM product_packaging WHERE product_id = ?");
            $stmt->execute([(int)$productId]);
            return $stmt->fetchAll();
        } catch (\PDOException $e) {
            return [];
        }
    }
}
