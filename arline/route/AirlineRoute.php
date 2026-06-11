<?php

require __DIR__."/../connection.php";
require __DIR__ . "/../controllers/AirlineController.php";

$path=$_SERVER["PATH_INFO"];
$method=$_SERVER["REQUEST_METHOD"];

if($method=="GET"&&$path=="/Airline"&& isset ($_GET["Id"])){
    GetALL($connection);
}elseif ($method== "GET" && $path =="/Airline"){
     
GetById ($connection);
}elseif($method=="GET"&& $path=="/Airline")
{
   GetByAirlineName($connection);
}elseif($method=="GET"&&$path=="/Airline"&&isset($_GET["Id"]))
{
    UpdateAirline($connection);
}elseif($method =="PATCH" && $path=="/Airline"&& isset($_GET["id"]))
{
    PatchAirline($connection);
}elseif($method=="DELETE"&& $path=="/Airline"&&isset($_GET["Id"]))
{
    DeleteAirline($connection);
}