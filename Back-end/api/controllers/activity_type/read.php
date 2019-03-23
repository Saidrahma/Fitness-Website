<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// database connection will be here
// include database and object files
include_once '../../config/database.php';
include_once '../../models/activity_type/activity_type.php';

// instantiate database and activityType object
$database = new Database();
$db = $database->getConnection();

// initialize object
$activityType = new ActivityType($db);

// read activityTypes will be here
// query activityTypes
$stmt = $activityType->read();
$num = $stmt->rowCount();

// check if more than 0 record found
if($num>0){

    // activityTypes array
    $activityTypes_arr=array();
    $activityTypes_arr["records"]=array();

    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);

        $activityType_item=array(
            "idActType" => $idActType,
            "nameType" => $nameType,
        );

        array_push($activityTypes_arr["records"], $activityType_item);
    }

    // set response code - 200 OK
    http_response_code(200);

    // show activityTypes data in json format
    echo json_encode($activityTypes_arr);
} else{

    // set response code - 404 Not found
    http_response_code(404);

    // tell the user no products found
    echo json_encode(
        array("message" => "No activityType found.")
    );
}

// no activityTypes found will be here