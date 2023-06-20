<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');
$data = json_decode(file_get_contents("php://input"),true);

$st_id = $data["sid"];
include 'connection.php';

$query = "DELETE FROM `students`WHERE `std_id` = '$st_id'";

if(mysqli_query($conn,$query))
{
    echo json_encode(array("msg" => "Record Deleted Successfully", "status" => true));
}
else {
    echo json_encode(array("msg" => "Cannot delete recored", "status" => false));
}

?>
