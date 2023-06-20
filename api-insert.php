<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');
$data = json_decode(file_get_contents("php://input"),true);


$st_name = $data["sname"];
$st_age = $data["sage"];
$st_city = $data["scity"];

include 'connection.php';

$query = "INSERT INTO `students` (`std_name`,`std_age`,`std_city`) values ('$st_name','$st_age','$st_city')";

if(mysqli_query($conn,$query))
{
    echo json_encode(array("msg" => "Record Inserted Successfully", "status" => true));
}
else {
    echo json_encode(array("msg" => "Cannot insert recored", "status" => false));
}

?>
