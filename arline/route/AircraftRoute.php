<?php
require __DIR__ ."/../connection.php";
require __DIR__ ."/../controllers/AircraftController.php";

$path=$_SERVER["PATH_INFO"];
$method=$_SERVER["REQUEST_METHOD"];

if($method=="GET" &&$path=="/Aircraft"&& isset($_GET["Id"]))
    { GetALL($connection);

}elseif($method="GET"&& $path=="/Aircraft"){
    UpdateAircraft($connection);
}elseif($method=="DELETE" && $path=="/Aircraft" && isset($_GET["Id"]));