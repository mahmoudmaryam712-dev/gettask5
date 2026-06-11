<?php

require __DIR__ ."/../connection.php";
require __DIR__ . "/../Controller/TransactionController.php";

$path=$_SERVER["PATH_INFO"];
$method =$_SERVER["REQUEST_METHOD"];

if ($method=="GET" && $path=="/Transaction"&& isset($_GET["Id"])){
    GetAll($connection);
}elseif($method=="GET" && $path=="/Transaction");
