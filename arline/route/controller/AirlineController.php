<?php

require __DIR__ . "/../repositories/AirlineRepo.php";
require __DIR__ . "/../helpers/response.php";

//GET ALL
function GetALL ($connection ,$id){

if (isset ($_GET["search"])){
    $id=$_GET["search"];
    $result =GetALL($connection);

}else{
    $result =GetById($connection ,$id); 
}

if ($result){
    response(200, "Airline retrieved successfully" , $result);

}else{
    response(404 , "No Airline to get");
}
}

// GET BY ID 

function GetById($connection){

$id=$_GET["Id"];
$Airline =GetById($connection,$id);

if ($Airline==null){
    response(404,  "Airline not found");

}
response(200, "Airline retrieved",$Airline);
}

// GAT BY Airline Name

function GetByAirlineName($connection){
if (isset($_GET["search"])){
    $name=$_GET["search"];
    $result=GetBYName($connection,$name);
}else{
    $result=GetAll($connection);
}

if($result){
    response(200, "Airline retrieved successfully ",$result);
}else{
    response(404 , "no Airline  to get ");
}
}


//POST 

Function UpdateAirline ($connection){

$id = $_GET ['id'];

$date = json_decode(file_get_contents("php://input"), true);

if (empty($date)){
    response(400,"all fields required");
}
$Airline =GetById ($connection,$id);

if ($Airline ==null){
    response(404 , "not found");
}

$AirlineName=$date['AirlineName']??$Airline['AirlineName'];
$PhoneNumber=$date['PhoneNumber']??$Airline['PhoneNumber'];
$Address=$date['Address']??$Airline['Address'];
$CurrentBalance=$date['Current Balance']??$Airline['Current Balance'];
$ContactPerson=$date['Contact Person']??$Airline['Contact Person'];

$result =Update ($connection,$id,$AirlineName,$Address,$ContactPerson,$CurrentBalance,$PhoneNumber);

if($result){
    response(200, "Airline updated");
}else{
    response(500,"Airline couldn't updated");
}
} 


//PATCH

function PatchAirline ($connection){

$id=$_GET ['id'];

$date =json_decode(file_get_contents("php://input"), true);

if(empty($date)){
    response(400,"the filed is required");
}
if ($id == null){
    response(404, "not found");   
}

$Address=$data['Address']??$id['Address'];

$result= Patch($connection, $id,$Address);

if($result){
    response(200,"Address updated");
}else{
    response(500,"Address couldn't updated");
}

}


//DELETE

function DeleteAirline ($connection){

$id =$_GET['id'];

$result=Delete($connection,$id);

if($result){
    response(200,"Airline Deleted");
}else{
    response(500, "Airline can not be Deleted");
}
}

