<?php
// Database Configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'quill');

// Establish Connection
try {
    $pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Database connected successfully";
} catch(PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

// Global Settings
define('SITE_NAME', 'Quill');
define('BASE_URL', 'http://localhost/quill');
?>