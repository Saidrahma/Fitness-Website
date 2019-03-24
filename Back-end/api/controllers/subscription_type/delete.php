<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include database and object file
include_once '../../config/database.php';
include_once '../../models/subscription_type/subscription_type.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare subscription_type object
$subscription_type = new SubscriptionType($db);

// get subscription_type id
$data = json_decode(file_get_contents("php://input"));

// set subscription_type id to be deleted
$subscription_type->idSubType = $data->idSubType;

// delete the subscription_type
if($subscription_type->delete()){

    // set response code - 200 ok
    http_response_code(200);

    // tell the user
    echo json_encode(array("message" => "subscription_type was deleted."));
}

// if unable to delete the subscription_type
else{

    // set response code - 503 service unavailable
    http_response_code(503);

    // tell the user
    echo json_encode(array("message" => "Unable to delete subscription_type."));
}
?>