<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// database connection will be here
// include database and object files
include_once '../../config/database.php';
include_once '../../models/planning/planning.php';

// instantiate database and planning object
$database = new Database();
$db = $database->getConnection();

// initialize object
$planning = new Planning($db);

// read plannings will be here
// query plannings
$stmt = $planning->read();
$num = $stmt->rowCount();

// check if more than 0 record found
if($num>0){

    // plannings array
    $plannings_arr=array();
    $plannings_arr["records"]=array();

    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);

        $planning_item=array(
            "idDay" => $idDay,
            "day" => $day,
        );

        array_push($plannings_arr["records"], $planning_item);
    }

    // set response code - 200 OK
    http_response_code(200);

    // show plannings data in json format
    echo json_encode($plannings_arr);
} else{

    // set response code - 404 Not found
    http_response_code(404);

    // tell the user no products found
    echo json_encode(
        array("message" => "No planning found.")
    );
}

// no plannings found will be here