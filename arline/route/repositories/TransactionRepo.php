<?php

//GET

function GetALL($connection){

$query="select Date , Amount , Description , TransactionType , BelongsToOneAirline from Transaction ";
$getTransaction=$connection->prepare($query);
$getTransaction->execute();

return $getTransaction->fetchAll(PDO::FETCH_ASSOC);

}


