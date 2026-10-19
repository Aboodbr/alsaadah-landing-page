<?php
// app/Models/Category.php

class Category {
    public static function getAll($pdo) {
        try {
            $stmt = $pdo->query("SELECT * FROM categories ORDER BY id ASC");
            return $stmt->fetchAll();
        } catch (\PDOException $e) {
            return [];
        }
    }

    public static function getBySlug($pdo, $slug) {
        try {
            $stmt = $pdo->prepare("SELECT * FROM categories WHERE slug = ?");
            $stmt->execute([$slug]);
            return $stmt->fetch();
        } catch (\PDOException $e) {
            return null;
        }
    }
}
