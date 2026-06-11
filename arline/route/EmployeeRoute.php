<?php
require __DIR__ ."//../connection.php";
require __DIR__ ."//..//controller/EmployeeController.php";

$path=$_SERVER["PATH_INFO"];
$method=$_SERVER["REQUEST_METHOD"];

if($method=="GET"&&$path=="/Employee"&&isset($_GET["Id"]))
    {
    GetByName($connection);
}elseif($method=="GET"&&$path=="/Employee")
{
    UpdateEmployee($connection);
}elseif($method=="DELETE"&&$path=="/Employee"&&isset($_GET["Id"]));