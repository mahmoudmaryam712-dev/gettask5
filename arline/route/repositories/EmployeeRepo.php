<?php

//GET BY NAME

function GetByName($connection,$name){

$query ="select name, id rom employee where name like ?";

$getEmployee =$connection-> prepare($query);
$getEmployee->execute([["%$name%"]]);

return $getEmployee->fetchAll(PDO::FETCH_ASSOC);

}

//POST

function Update($connection ,$id , $name ,$BirthDate , $Gender, $Position , $TheAirlineTheyWorkFor){

$update =$connection->prepare("update Employee set name=? , BirthDate=? , Gender=? , Position=? , TheAirlineTheyWorkFor=? where id=?");

$update->execute([$id , $name ,$BirthDate , $Gender, $Position , $TheAirlineTheyWorkFor]);

return $update->rowCount()>0;

}