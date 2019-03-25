<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../../config/database.php';
include_once '../../models/trainer/trainer.php';

$database = new Database();
$db = $database->getConnection();

$trainer = new Trainer($db);

// get posted data
$data = json_decode(file_get_contents("php://input"));

// make sure data is not empty
if(
    !empty($data->nameTrainer) &&
    !empty($data->addressTrainer)
){

    // set trainer property values
    $trainer->nameTrainer = $data->nameTrainer;
    $trainer->addressTrainer = $data->addressTrainer;

    // create the trainer
    if($trainer->create()){

        // set response code - 201 created
        http_response_code(201);

        // tell the user
        echo json_encode(array("message" => "trainer was created."));
    }

    // if unable to create the trainer, tell the user
    else{

        // set response code - 503 service unavailable
        http_response_code(503);

        // tell the user
        echo json_encode(array("message" => "Unable to create trainer."));
    }
}

// tell the user data is incomplete
else{

    // set response code - 400 bad request
    http_response_code(400);

    // tell the user
    echo json_encode(array("message" => "Unable to create trainer. Data is incomplete."));
}
?>