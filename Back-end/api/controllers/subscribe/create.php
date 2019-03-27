<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../../config/database.php';
include_once '../../models/subscribe/subscribe.php';

$database = new Database();
$db = $database->getConnection();

$subscribe = new Subscribe($db);

// get posted data
$data = json_decode(file_get_contents("php://input"));

// make sure data is not empty
if(
    !empty($data->idMember) &&
    !empty($data->idSubType) &&
    !empty($data->dateDebut) &&
    !empty($data->dateFin)
){

    // set subscribe property values
    $subscribe->idMember = $data->idMember;
    $subscribe->idSubType = $data->idSubType;
    $subscribe->dateDebut = $data->dateDebut;
    $subscribe->dateFin = $data->dateFin;

    // create the subscribe
    if($subscribe->create()){

        // set response code - 201 created
        http_response_code(201);

        // tell the user
        echo json_encode(array("message" => "subscribe was created."));
    }

    // if unable to create the subscribe, tell the user
    else{

        // set response code - 503 service unavailable
        http_response_code(503);

        // tell the user
        echo json_encode(array("message" => "Unable to create subscribe."));
    }
}

// tell the user data is incomplete
else{

    // set response code - 400 bad request
    http_response_code(400);

    // tell the user
    echo json_encode(array("message" => "Unable to create subscribe. Data is incomplete."));
}
?>