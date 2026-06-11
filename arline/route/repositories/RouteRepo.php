<?php

//GET ALL

function GetAll($connection){
    $query="select id, Origin , Classification , Distance , Destination from Route ";
    $getRoute=$connection->prepare($query);
    $getRoute->execute();

    return $getRoute->fetchAll(PDO::FETCH_ASSOC);

}


//POST

function Update($connection ,$id,$Origin ,$Classification ,$Distance ,$Destination){

$update =$connection->prepare("update Route set Origin=? ,Classification=? , Distance=?, Destination=? where id=?");
$update->execute ([ $id,$Origin ,$Classification ,$Distance ,$Destination]);

return $update->rowCount() >0 ;
}


// POST - ASSIGN AIRCRAFT TO THE ROUTE

function UpdateAircraft($connection , $TicketPrice ,$DateTime ,$NumberOfPassengers ,$ArrivalDateTime ,$id){
    $update =$connection->prepare("update Aircraft set TicketPrice=? , DateTime=? , NumberOfPassengers=? ,ArrivalDateTime=? where id=? ");
    $update->execute( [$TicketPrice ,$DateTime ,$NumberOfPassengers ,$ArrivalDateTime ]);

    return $update->rowCount() >0 ;



}

