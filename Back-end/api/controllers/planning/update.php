<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include database and object files
include_once '../../config/database.php';
include_once '../../models/planning/planning.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare planning object
$planning = new Planning($db);

// get id of planning to be edited
$data = json_decode(file_get_contents("php://input"));

// set ID property of planning to be edited
$planning->idDay = $data->idDay;

// set planning property values
$planning->day = $data->day;



// update the planning
if($planning->update()){

    // set response code - 200 ok
    http_response_code(200);

    // tell the user
    echo json_encode(array("message" => "planning was updated."));
}

// if unable to update the planning, tell the user
else{

    // set response code - 503 service unavailable
    http_response_code(503);

    // tell the user
    echo json_encode(array("message" => "Unable to update planning."));
}
?>