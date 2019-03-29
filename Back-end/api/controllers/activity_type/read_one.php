<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

// include database and object files
include_once '../../config/database.php';
include_once '../../models/activity_type/activity_type.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare activityType object
$activityType = new ActivityType($db);

// set ID property of record to read
$activityType->idActType = isset($_GET['id']) ? $_GET['id'] : die();

// read the details of activityType to be edited
$activityType->readOne();

if($activityType->nameType!=null){
    // create array
    $activityType_arr = array(
        "idActType" => $activityType->idActType,
        "nameType" => $activityType->nameType,
        "description" => $activityType->description,
    );

    // set response code - 200 OK
    http_response_code(200);

    // make it json format
    echo json_encode($activityType_arr);
}

else{
    // set response code - 404 Not found
    http_response_code(404);

    // tell the user activityType does not exist
    echo json_encode(array("message" => "activityType does not exist."));
}
?>