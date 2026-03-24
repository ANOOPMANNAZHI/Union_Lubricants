<?php
$host = '127.0.0.1';
$db = 'lubricants';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);

    $tables = ['products', 'posts', 'users', 'industries', 'product_categories', 'services', 'testimonials', 'abouts', 'banners', 'certifications', 'enquiries'];

    echo "Database Import Summary:\n";
    echo "========================\n\n";

    foreach ($tables as $table) {
        $result = $pdo->query("SELECT COUNT(*) as count FROM $table")->fetch(PDO::FETCH_ASSOC);
        $count = $result['count'];
        echo "$table: " . $count . " records\n";
    }

} catch (\Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
