<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include database and object files
include_once '../../config/database.php';
include_once '../../models/subscription_type/subscription_type.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare subscription_type object
$subscription_type = new SubscriptionType($db);

// get id of subscription_type to be edited
$data = json_decode(file_get_contents("php://input"));

// set ID property of subscription_type to be edited
$subscription_type->idSubType = $data->idSubType;

// set subscription_type property values
$subscription_type->nameSubType = $data->nameSubType;
$subscription_type->priceSubType = $data->priceSubType;
$subscription_type->durationSubType = $data->durationSubType;


// update the subscription_type
if($subscription_type->update()){

    // set response code - 200 ok
    http_response_code(200);

    // tell the user
    echo json_encode(array("message" => "subscription_type was updated."));
}

// if unable to update the subscription_type, tell the user
else{

    // set response code - 503 service unavailable
    http_response_code(503);

    // tell the user
    echo json_encode(array("message" => "Unable to update subscription_type."));
}
?>