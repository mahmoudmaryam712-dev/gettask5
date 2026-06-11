<?php

require __DIR__ ."/../repositories/TransactionRepo.php";
require __DIR__ ."/../helpers/response.php";

//GET ALL
function GetALL ($connection ,$id){

if (isset ($_GET["search"])){
    $id=$_GET["search"];
    $result =GetALL($connection);

}else{
    $result =GetById($connection ,$id); 
}

if ($result){
    response(200, "Transaction retrieved successfully" , $result);

}else{
    response(404 , "No Transaction to get");
}
}
