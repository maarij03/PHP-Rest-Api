<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');
$data = json_decode(file_get_contents("php://input"),true);

$st_id = $data["sid"];
$st_name = $data["sname"];
$st_age = $data["sage"];
$st_city = $data["scity"];

include 'connection.php';

$query = "UPDATE `students` SET `std_name` = '$st_name' ,`std_age` = '$st_age',`std_city`= '$st_city' WHERE `std_id` = '$st_id'";

if(mysqli_query($conn,$query))
{
    echo json_encode(array("msg" => "Record Updated Successfully", "status" => true));
}
else {
    echo json_encode(array("msg" => "Cannot update recored", "status" => false));
}

?>
