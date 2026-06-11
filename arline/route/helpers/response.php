<?php
function response ($code , $message , $data=null){

header("content-Type : application/json");
http_response_code($code);
echo json_encode(["message"=> $message , "data" => $data]);

exit;


}