<?php
error_reporting(0);

header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
header('Action-Control-Allow-Method:POST');
header('Access-COntrol-Allow: Content-Type,Access-Control-Allow-Header, Authorization, x-Request-with');

include('function.php');

$requestMethod = $_SERVER["REQUEST_METHOD"];

if($requestMethod == 'POST') {

    $inputdata = json_decode(file_get_contents("php://input"), true);
    if(empty($inputdata)){
      
        $storecustomer = storecustomer($_POST);

    }
    else
    {       
        $storecustomer = storecustomer($inputdata);    
        
    }
        echo $storecustomer;

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
