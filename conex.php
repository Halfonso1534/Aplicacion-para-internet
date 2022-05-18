<?php
define('USER', 'root');
define('PASSWORD', '1534');
define('HOST', 'localhost');
define('DATABASE', 'AlbionWEB');
 
try {
    $connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD);
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}
?>
