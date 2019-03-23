<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

// include database and object files
include_once '../../config/database.php';
include_once '../../models/activity/activity.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare activity object
$activity = new Activity($db);

// set ID property of record to read
$activity->idActivity = isset($_GET['id']) ? $_GET['id'] : die();

// read the details of activity to be edited
$activity->readOne();

if($activity->nameActivity!=null){
    // create array
    $activity_arr = array(
        "idActivity" => $activity->idActivity,
        "nameActivity" => $activity->nameActivity,
        "description" => $activity->description,
        "idDay" => $activity->idDay,
        "idActType" => $activity->idActType,
    );

    // set response code - 200 OK
    http_response_code(200);

    // make it json format
    echo json_encode($activity_arr);
}

else{
    // set response code - 404 Not found
    http_response_code(404);

    // tell the user activity does not exist
    echo json_encode(array("message" => "activity does not exist."));
}
?>