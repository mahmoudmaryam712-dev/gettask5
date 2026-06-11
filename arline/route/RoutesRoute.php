<?php
require __DIR__ ."/../connection.php";
require __DIR__ ."/../Controller/RouteController.php";


$path=$_SERVER["PATH_INFO"];
$method =$_SERVER["REQUEST_METHOD"];

if ($method=="GET" && $path=="/Route"&& isset($_GET["Id"])){
    GetAll($connection);
}elseif($method=="GET" && $path=="/Route")
{
    UpdateRoute($connection);

}elseif($method=="POST" && $path=="/Route" && isset ($_GET["id"]))
{
    UpdateAssign($connection);

}elseif($method =="DELETE" && $path =="/Route" && isset($_GET["Id"]));