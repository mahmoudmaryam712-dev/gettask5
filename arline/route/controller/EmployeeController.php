<?php
require __DIR__ . "/../repositories/EmployeeRepo.php";
require __DIR__ . "/../helpers/response.php";


//GET BY NAME

function GetByName ($connection){
    if(isset($_GET["search"])){
        $name=$_GET["search"];
        $result=GetByName($connection,$name);
    }else{
        $result=GetALL($connection);
    }

    if($result){
        response(200, "Employee retrieved successfully", $result);
    }else{
        response(404,"no Employee to get");
    }

} 

//POST

function UpdateEmployee($connection){
    $id =$_GET['id'];
    $date = json_decode(file_get_contents("php://input"), true);
    
    if(empty($date)){
        response(400,"all employee fields required ");
    }
    $Employee=GetById($connection,$id);

    if($Employee==null){
        response(404,"not found");
    }

    $name=$date['name']??$Employee['name'];
    $BirthDate=$date['BirthDate']??$Employee['BirthDate'];
    $Gender=$date['Gender']??$Employee['Gender'];
    $Position=$date['Position']??$Employee['Position'];
    $TheAirlineTheyWorkFor=$date['TheAirlineTheyWorkFor']??$Employee['TheAirlineTheyWorkFor'];

    $result=Update ($connection,$id , $name ,$BirthDate , $Gender, $Position , $TheAirlineTheyWorkFor) ;

    if ($result){
        response(200,"Employee updated");
    }else{
        response(500,"Employee couldn't be updated");
    }
}