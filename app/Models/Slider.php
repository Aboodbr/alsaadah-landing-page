<?php
// app/Models/Slider.php

class Slider {
    public static function getAll($pdo) {
        try {
            $stmt = $pdo->query("SELECT * FROM sliders");
            return $stmt->fetchAll();
        } catch (\PDOException $e) {
            return [];
        }
    }
}
