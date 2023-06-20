<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$data = json_decode(file_get_contents("php://input"),true);
$student_data = $data["id"];

include 'connection.php';

$query = mysqli_query($conn,"SELECT * FROM `students` where `std_id` = '$student_data'");

if(mysqli_num_rows($query)> 0)
{
    $output = mysqli_fetch_all($query,MYSQLI_ASSOC);
    echo json_encode($output); 
}else {
    echo json_encode(array("msg" => "no record found", "status" => false));
}

?>
