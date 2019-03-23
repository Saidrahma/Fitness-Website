<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

// include database and object files
include_once '../../config/database.php';
include_once '../../models/planning/planning.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare planning object
$planning = new Planning($db);

// set ID property of record to read
$planning->idDay = isset($_GET['id']) ? $_GET['id'] : die();

// read the details of planning to be edited
$planning->readOne();

if($planning->day!=null){
    // create array
    $planning_arr = array(
        "idDay" => $planning->idDay,
        "day" => $planning->day,
    );

    // set response code - 200 OK
    http_response_code(200);

    // make it json format
    echo json_encode($planning_arr);
}

else{
    // set response code - 404 Not found
    http_response_code(404);

    // tell the user planning does not exist
    echo json_encode(array("message" => "planning does not exist."));
}
?>