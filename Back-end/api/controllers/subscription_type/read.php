<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// database connection will be here
// include database and object files
include_once '../../config/database.php';
include_once '../../models/subscription_type/subscription_type.php';

// instantiate database and subscription_type object
$database = new Database();
$db = $database->getConnection();

// initialize object
$subscription_type = new SubscriptionType($db);

// read subscription_types will be here
// query subscription_types
$stmt = $subscription_type->read();
$num = $stmt->rowCount();

// check if more than 0 record found
if($num>0){

    // subscription_types array
    $subscription_types_arr=array();
    $subscription_types_arr["records"]=array();

    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);

        $subscription_type_item=array(
            "idSubType" => $idSubType,
            "nameSubType" => $nameSubType,
            "priceSubType" => $priceSubType,
            "durationSubType" => $durationSubType,
        );

        array_push($subscription_types_arr["records"], $subscription_type_item);
    }

    // set response code - 200 OK
    http_response_code(200);

    // show subscription_types data in json format
    echo json_encode($subscription_types_arr);
} else{

    // set response code - 404 Not found
    http_response_code(404);

    // tell the user no products found
    echo json_encode(
        array("message" => "No subscription type found.")
    );
}

// no subscription_types found will be here