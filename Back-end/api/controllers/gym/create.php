<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../../config/database.php';
include_once '../../models/gym/gym.php';

$database = new Database();
$db = $database->getConnection();

$gym = new Gym($db);

// get posted data
$data = json_decode(file_get_contents("php://input"));

// make sure data is not empty
if(
    !empty($data->nameSalle) &&
    !empty($data->addressSalle) &&
    !empty($data->townSalle)
){

    // set gym property values
    $gym->nameSalle = $data->nameSalle;
    $gym->addressSalle = $data->addressSalle;
    $gym->townSalle = $data->townSalle;


    // create the gym
    if($gym->create()){

        // set response code - 201 created
        http_response_code(201);

        // tell the user
        echo json_encode(array("message" => "gym was created."));
    }

    // if unable to create the gym, tell the user
    else{

        // set response code - 503 service unavailable
        http_response_code(503);

        // tell the user
        echo json_encode(array("message" => "Unable to create gym."));
    }
}

// tell the user data is incomplete
else{

    // set response code - 400 bad request
    http_response_code(400);

    // tell the user
    echo json_encode(array("message" => "Unable to create gym. Data is incomplete."));
}
?>