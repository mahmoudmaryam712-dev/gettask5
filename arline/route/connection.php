<?php

$host = "localhost";
$user = "root";
$pass = ""  ;
$database = "task 5" ;

try {
    $connection = new PDO("mysql : localhost = $localhost ; dbname = $database" , $user , $pass);
    $connection->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);

} catch (PDOException $err){
    echo "connection failed " . $err->getMessage();
}