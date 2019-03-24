<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

// include database and object files
include_once '../../config/database.php';
include_once '../../models/subscription_type/subscription_type.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare subscription_type object
$subscription_type = new SubscriptionType($db);

// set ID property of record to read
$subscription_type->idSubType = isset($_GET['id']) ? $_GET['id'] : die();

// read the details of subscription_type to be edited
$subscription_type->readOne();

if($subscription_type->nameSubType!=null){
    // create array
    $subscription_type_arr = array(
        "idSubType" => $subscription_type->idSubType,
        "nameSubType" => $subscription_type->nameSubType,
        "priceSubType" => $subscription_type->priceSubType,
        "durationSubType" => $subscription_type->durationSubType,
    );

    // set response code - 200 OK
    http_response_code(200);

    // make it json format
    echo json_encode($subscription_type_arr);
}

else{
    // set response code - 404 Not found
    http_response_code(404);

    // tell the user subscription_type does not exist
    echo json_encode(array("message" => "subscription_type does not exist."));
}
?>