<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include database and object files
include_once '../../config/database.php';
include_once '../../models/trainer/trainer.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare trainer object
$trainer = new Trainer($db);

// get id of trainer to be edited
$data = json_decode(file_get_contents("php://input"));

// set ID property of trainer to be edited
$trainer->idTrainer = $data->idTrainer;

// set trainer property values
$trainer->nameTrainer = $data->nameTrainer;
$trainer->addressTrainer = $data->addressTrainer;


// update the trainer
if($trainer->update()){

    // set response code - 200 ok
    http_response_code(200);

    // tell the user
    echo json_encode(array("message" => "trainer was updated."));
}

// if unable to update the trainer, tell the user
else{

    // set response code - 503 service unavailable
    http_response_code(503);

    // tell the user
    echo json_encode(array("message" => "Unable to update trainer."));
}
?>