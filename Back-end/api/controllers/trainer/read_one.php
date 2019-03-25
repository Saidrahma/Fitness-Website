<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

// include database and object files
include_once '../../config/database.php';
include_once '../../models/trainer/trainer.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare trainer object
$trainer = new Trainer($db);

// set ID property of record to read
$trainer->idTrainer = isset($_GET['id']) ? $_GET['id'] : die();

// read the details of trainer to be edited
$trainer->readOne();

if($trainer->nameTrainer!=null){
    // create array
    $trainer_arr = array(
        "idTrainer" => $trainer->idTrainer,
        "nameTrainer" => $trainer->nameTrainer,
        "addressTrainer" => $trainer->addressTrainer,
    );

    // set response code - 200 OK
    http_response_code(200);

    // make it json format
    echo json_encode($trainer_arr);
}

else{
    // set response code - 404 Not found
    http_response_code(404);

    // tell the user trainer does not exist
    echo json_encode(array("message" => "trainer does not exist."));
}
?>