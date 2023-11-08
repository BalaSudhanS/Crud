<?php

require '../inc/dbcon.php';

function error422($message)
{

    $data = [
        'status' => 422,
        'message' => $message,
    ];
    header("http/1.0 422 unprocessable enity");
    echo json_encode($data);
    exit();
}


function storecustomer($customerinput)
{

    global $conn;

    $name = mysqli_real_escape_string($conn, $customerinput['name']);
    $email = mysqli_real_escape_string($conn, $customerinput['email']);
    $phone = mysqli_real_escape_string($conn, $customerinput['phone']);

    if(empty(trim($name))){

        return error422('Enter your name');
    }elseif(empty(trim($email))){

        return error422('Enter your email');
    }elseif(empty(trim($phone))){

        return error422('Enter your phone');
    }
    else
    {
        $query = "INSERT INTO customers (name,email,phone) VALUES ('$name','$email','$phone')";
        $result = mysqli_query($conn, $query);

        if($result){

            $data = [
                'status' => 201,
                'message' => 'Customer Created Successfully'
            ];
            header("http/1.0 201 Created ");
            return json_encode($data);

        }else
        {
           
            $data = [
                'status' => 500,
                'message' => 'Internal Server Error',
            ];
            header("http/1.0 500 Internal Server Error");
            return json_encode($data);

        }
    }
}

function getcustomerlist(){

    global $conn;

    $query = "SELECT * FROM customers";
    $query_run = mysqli_query($conn,$query);

    if($query_run){

        if(mysqli_num_rows($query_run) > 0){

            $res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);
           
            $data = [
                'status' => 200,
                'message' => ' Customer List Fetched Successfully ',
                'data' => $res
            ];
            header("http/1.0 200 Ok");
            return json_encode($data);

        }
        else
        {
            $data = [
                'status' => 404,
                'message' => 'No Customer Found',
            ];
            header("http/1.0 404 No Customer Found");
            return json_encode($data);
        }


    }
    else
    {
        $data = [
            'status' => 500,
            'message' => 'internal sever error',
        ];
        header("http/1.0 500 internal sever error");
        return json_encode($data);   
    }
    

}

function getcustomer($customerParams){

    global $conn;

    if($customerParams['id'] == null){

        return error422('Enter your customer id');
    }

    $customerid = mysqli_real_escape_string($conn, $customerParams['id']);

    $query = "SELECT * FROM customers Where id='$customerid' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if($result){

        if(mysqli_num_rows($result) == 1)
        {
            $res = mysqli_fetch_assoc($result);

            $data = [
                'status' => 200,
                'message' => 'Customer Fetched Successfully',
                'data' => $res
            ];
            header("http/1.0 200 Ok");
            return json_encode($data);
        }
        else
        {
            $data = [
                'status' => 404,
                'message' => 'No Customer Found',
            ];
            header("http/1.0 404 Not Found");
            return json_encode($data);
        }

    }else
    {
        $data = [
            'status' => 500,
            'message' => 'internal sever error',
        ];
        header("http/1.0 500 internal sever error");
        return json_encode($data);
    }
}
function updatecustomer($customerinput, $customerParams)
{

    global $conn;

    if(!isset($customerParams['id'])){

        return error422('customer id not found in URL');
    }elseif($customerParams['id'] == null){

        return error422('Enter the customer id');
    }

    $customerid = mysqli_real_escape_string($conn, $customerParams['id']);

    $name = mysqli_real_escape_string($conn, $customerinput['name']);
    $email = mysqli_real_escape_string($conn, $customerinput['email']);
    $phone = mysqli_real_escape_string($conn, $customerinput['phone']);

    if(empty(trim($name))){

        return error422('Enter your name');
    }elseif(empty(trim($email))){

        return error422('Enter your email');
    }elseif(empty(trim($phone))){

        return error422('Enter your phone');
    }
    else
    {
        $query = "UPDATE customers SET name= '$name',email='$email',phone='$phone'WHERE id='$customerid' LIMIT 1";
        $result = mysqli_query($conn, $query);

        if($result){

            $data = [
                'status' => 200,
                'message' => 'Customer Updated Successfully'
            ];
            header("http/1.0 200 Success");
            return json_encode($data);

        }else
        {
           
            $data = [
                'status' => 500,
                'message' => 'Internal Server Error',
            ];
            header("http/1.0 500 Internal Server Error");
            return json_encode($data);

        }
    }
}

function deletecustomer($customerParams){

    global $conn;

    if(!isset($customerParams['id'])){

        return error422('customer id not found in URL');
    }elseif($customerParams['id'] == null){

        return error422('Enter the customer id');
    }

    $customerid = mysqli_real_escape_string($conn, $customerParams['id']);
    
    $query = "DELETE FROM customers WHERE id='$customerid' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if($result){

        $data = [
            'status' => 200,
            'message' => 'Customer Deleted Successfully',
        ];
        header("http/1.0 200 Ok");
        return json_encode($data);

    }else{

        $data = [
            'status' => 404,
            'message' => 'Customer Not Found',
        ];
        header("http/1.0 404 Not Found");
        return json_encode($data);
    }


}


?>