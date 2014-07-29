<?php
define('DBHOST', 'localhost');
define('DBNAME', 'foivault_base');
define('DBUSER', 'root');
define('DBAUTH', 'goooogle8'); //restricted
 
try {
    $conn = new PDO('mysql:host='.DBHOST.';dbname='.DBNAME, DBUSER, DBAUTH);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo 'Connection Error: ' . $e->getMessage();
}
?>
