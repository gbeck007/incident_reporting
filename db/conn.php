<?php 
 //$host = "127.0.0.1";
 //$db = "incident_db";
 //$user = "root";
 //$pass = '';
 //$charset = "utf8mb4";


//Hosting
$host = 'applied-web.mysql.database.azure.com';
$db = 'glassford_beckford_incident_report';
$user = 'appliedweb_user@applied-web';
$pass = 'P@ssword1';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
try{
    $pdo = new PDO($dsn, $user, $pass);
    echo "Welcome ";


} catch(PDOException $e) {
    throw new PDOException($e->getMessage());
}

require_once 'crud.php';
require_once 'user.php';
 $crud = new crud($pdo);
 $user = new user($pdo);

 //$user->insertUser("gbeckford", "password", "admin");
?>
