<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// database connection will be here
// include database and object files
include_once '../../config/database.php';
include_once '../../models/activity/activity.php';

// instantiate database and activity object
$database = new Database();
$db = $database->getConnection();

// initialize object
$activity = new Activity($db);

// read activitys will be here
// query activitys
$stmt = $activity->read();
$num = $stmt->rowCount();

// check if more than 0 record found
if($num>0){

    // activitys array
    $activitys_arr=array();
    $activitys_arr["records"]=array();

    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);

        $activity_item=array(
            "idActivity" => $idActivity,
            "nameActivity" => $nameActivity,
            "description" => $description,
            "idDay" => $idDay,
            "idActType" => $idActType,
        );

        array_push($activitys_arr["records"], $activity_item);
    }

    // set response code - 200 OK
    http_response_code(200);

    // show activitys data in json format
    echo json_encode($activitys_arr);
} else{

    // set response code - 404 Not found
    http_response_code(404);

    // tell the user no products found
    echo json_encode(
        array("message" => "No activity found.")
    );
}

// no activitys found will be here