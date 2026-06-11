<?php

// GET ALL 

function GetALL ($connection){
    $query ="select Airline ID , Airline name ,Phone number , Address , Contact person , Current balance ";
    $getAirline =$connection->prepare($query);
    $getAirline->execute();
    return $getAirline ->fetchAll (PDO::FETCH_ASSOC);

}

// Get BY ID

function  GetById ($connection , $id){
    $query="select * from Airline where id=?";
    $getByID =$connection->prepare($query);
    $getByID->execute([$id]);
    return $getByID->fetch(PDO::FETCH_ASSOC);

}

// GET BY Airline name

function GetByName ($connection , $name){

$query = "select name ,id from Airline where name like ?";

$getAirline=$connection->prepare($query);
$getAirline->execute([["%$name%"]]);
return  $getAirline->fetchAll(PDO::FETCH_ASSOC);

}

// POST 

function Update ($connection , $id , $name , $number , $address , $cp , $cb){

$update = $connection->prepare("update Airline set Airline name=? , address=? , Phone number =? , contact person=?, current balance =? where Airline ID=? ");
$update->execute([$name , $id , $number ,$address ,$cp ,$cb ]);

return $update ->rowCount() >0 ;
}

// PATCH

function PATCH ($connection, $id ,$address){
    $patch =$connection->prepare("patch Airline set address=? where Airline ID=?");
    $patch->execute([ $id,$address]);

    return $patch->fetch(PDO::FETCH_ASSOC);
}



// DELETE

function Delete ($connection , $id){

$delete =$connection->prepare("Delete from Airline where id=?");

$delete->execute([$id]);

return $delete->rowCount() >0;

}