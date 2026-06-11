<?php
require __DIR__ ."/../repositories/AircraftRepo.php";
require __DIR__ ."/../helpers/response.php";

function GetAll($connection,$id){

if (isset($_GET["search"])){
    $name =$_GET["search"];
    $result=GetALL($connection);
}else{
    $result=GetById($connection,$id);
}

if($result){
    response(200, "Aircraft retrieved successfully", $result);
}else {
    response(404,"no Aircraft to get");
}
}

function UpdateAircraft($connection){

$id=$_GET['id'];

$date = json_decode(file_get_contents("php//input"),true);

if (empty($date)){
    response(400, "all Aircraft required");
}
$Aircraft=GetById($connection,$id);

if ($Aircraft==null){
    response(404,"not found");
}

$Model= $date['Model']??$Aircraft['Model'];
$Capacity=$date['Capacity']??$Aircraft['Capacity'];
$TheAirlineThatOwnIt=$date['TheAirlineThatOwnIt']??$Aircraft['TheAirlineThatOwnIt'];

$result=Update($connection,$id,$Model,$Capacity,$TheAirlineThatOwnIt);

if($result){
    response(200,"Aircraft updated");
}else{
    response(500,"Aircraft couldn't updated");
}


}