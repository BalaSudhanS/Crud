<?php

header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
header('Action-Control-Allow-Method:DELETE');
header('Access-COntrol-Allow: Content-Type,Access-Control-Allow-Header, Authorization, x-Request-with');

include('function.php');

$requestMethod = $_SERVER["REQUEST_METHOD"];

if($requestMethod == "DELETE"){   

    $deletecustomer = deletecustomer($_GET);
    echo $deletecustomer;
   
    
}
else 
{
    $data = [
        'status' => 405,
        'message' => $requestMethod. ' Method Not Allowed',
    ];
    header("http/1.0 405 Method Not Allowed");
    echo json_encode($data); 

}
?>