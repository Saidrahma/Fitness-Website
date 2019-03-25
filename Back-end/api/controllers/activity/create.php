<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../../config/database.php';
include_once '../../models/activity/activity.php';

$database = new Database();
$db = $database->getConnection();

$activity = new Activity($db);

// get posted data
$data = json_decode(file_get_contents("php://input"));

// make sure data is not empty
if(
    !empty($data->nameActivity) &&
    !empty($data->description) &&
    !empty($data->idDay) &&
    !empty($data->idActType)&&
    !empty($data->idTrainer)
){

    // set activity property values
    $activity->nameActivity = $data->nameActivity;
    $activity->description = $data->description;
    $activity->idDay = $data->idDay;
    $activity->idActType = $data->idActType;
    $activity->idTrainer = $data->idTrainer;

    // create the activity
    if($activity->create()){

        // set response code - 201 created
        http_response_code(201);

        // tell the user
        echo json_encode(array("message" => "activity was created."));
    }

    // if unable to create the activity, tell the user
    else{

        // set response code - 503 service unavailable
        http_response_code(503);

        // tell the user
        echo json_encode(array("message" => "Unable to create activity."));
    }
}

// tell the user data is incomplete
else{

    // set response code - 400 bad request
    http_response_code(400);

    // tell the user
    echo json_encode(array("message" => "Unable to create activity. Data is incomplete."));
}
?>