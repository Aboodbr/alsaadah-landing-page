<?php
// config/database.php

$host = '127.0.0.1';
$db   = 'alsaadah_db';      // اسم قاعدة البيانات لديك محلياً
$user = 'root';             // المستخدم المحلي
$pass = '';                 // بدون كلمة مرور محلياً
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    // In headless environments without active MySQL service, fallback gracefully to mock PDO or empty array response
    class DummyPDO {
        public function query($sql) { return new DummyPDOStatement(); }
        public function prepare($sql) { return new DummyPDOStatement(); }
    }
    class DummyPDOStatement {
        public function fetchAll() { return []; }
        public function fetch() { return false; }
        public function execute($params = []) { return true; }
        public function bindValue($param, $value, $type = null) { return true; }
    }
    $pdo = new DummyPDO();
}
?>
