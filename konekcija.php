<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'pzi';

//DSN
$dsn = 'mysql:host=' . "$host" . ";dbname=" . "$dbname";

//Creating connection
try{
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    $pdo = NULL;
    print("Dogodila se greška: $e");
}

?>