<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');
$data = json_decode(file_get_contents("php://input"),true);

$search_term = $data["searchterm"];
include 'connection.php';

$query = "SELECT * FROM `students`WHERE `std_name` LIKE '%$search_term%' OR `std_city` LIKE '%$search_term%'";
$exe = mysqli_query($conn,$query);
if(mysqli_num_rows($exe) > 0)
{
    $output = mysqli_fetch_all($exe,MYSQLI_ASSOC);
    echo json_encode($output);
}
else {
    echo json_encode(array("msg" => "No Search Found", "status" => false));
}

?>
