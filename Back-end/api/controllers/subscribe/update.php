<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include database and object files
include_once '../../config/database.php';
include_once '../../models/subscribe/subscribe.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare subscribe object
$subscribe = new Subscribe($db);

// get id of subscribe to be edited
$data = json_decode(file_get_contents("php://input"));

// set ID property of subscribe to be edited
$subscribe->idMember = $data->idMember;

// set subscribe property values
$subscribe->idSubType = $data->idSubType;
$subscribe->dateDebut = $data->dateDebut;
$subscribe->dateFin = $data->dateFin;


// update the subscribe
if($subscribe->update()){

    // set response code - 200 ok
    http_response_code(200);

    // tell the user
    echo json_encode(array("message" => "subscribe was updated."));
}

// if unable to update the subscribe, tell the user
else{

    // set response code - 503 service unavailable
    http_response_code(503);

    // tell the user
    echo json_encode(array("message" => "Unable to update subscribe."));
}
?>