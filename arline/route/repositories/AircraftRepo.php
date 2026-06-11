<?php

//GET ALL

function GetALL($connection){
    $query="select Model , Capacity, TheAirlineThatOwnIt from Aircraft";
    $getAircraft=$connection->prepare($query);
    $getAircraft->execute();
    return $getAircraft->fetchAll(PDO::FETCH_ASSOC);
}



//POST

function Update($connection ,$id , $Model,$Capacity,$TheAirlineThatOwnIt){
$update=$connection->prepare("update Aircraft set Model=? , Capacity=? ,TheAirlineThatOwnIt=? where id=?");

$update->execute([$id , $Model,$Capacity,$TheAirlineThatOwnIt]);

return $update->rowCount()>0 ;

}