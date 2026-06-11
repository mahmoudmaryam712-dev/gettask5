<?php
require __DIR__ . "/../repositories/RouteRepo.php";
require __DIR__."/../helpers/response.php";

//GET ALL
function GetALL ($connection ,$id){

if (isset ($_GET["search"])){
    $id=$_GET["search"];
    $result =GetALL($connection);

}else{
    $result =GetById($connection ,$id); 
}

if ($result){
    response(200, "Route retrieved successfully" , $result);

}else{
    response(404 , "No Route to get");
}
}


//POST 

Function UpdateRoute ($connection){

$id = $_GET ['id'];

$date = json_decode(file_get_contents("php://input"), true);

if (empty($date)){
    response(400,"all fields required");
}
$Route =GetById ($connection,$id);

if ($Route ==null){
    response(404 , "not found");
}

$Origin=$date['Origin']??$Route['Origin'];
$Classification=$date['Classification']??$Route['Classification'];
$Destination=$date['Destination']??$Route['Destination'];
$Distance=$date['Distance']??$Route['Distance'];

$result =Update ($connection,$id,$Origin ,$Classification ,$Distance ,$Destination);

if($result){
    response(200, "Route updated");
}else{
    response(500,"Route couldn't updated");
}
}



//POST - ASSIGN AIRCRAFT TO THE ROUTE

Function UpdateAssign ($connection){

$id = $_GET ['id'];

$date = json_decode(file_get_contents("php://input"), true);

if (empty($date)){
    response(400,"all fields required");
}
$Route =GetById ($connection,$id);

if ($Route ==null){
    response(404 , "not found");
}

$TicketPrice=$date['TicketPrice']??$Route['TicketPrice'];
$DateTime=$date['DateTime']??$Route['DateTime'];
$NumberOfPassengers=$date['NumberOfPassengers']??$Route['NumberOfPassengers'];
$ArrivalDateTime=$date['ArrivalDateTime']??$Route['ArrivalDateTime'];

$result =Update ($connection,$id,$TicketPrice ,$DateTime ,$NumberOfPassengers ,$ArrivalDateTime );

if($result){
    response(200, "Assign aircraft updated");
}else{
    response(500,"Assign aircraft couldn't updated");
}
} 
