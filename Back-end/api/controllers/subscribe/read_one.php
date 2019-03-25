<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

// include database and object files
include_once '../../config/database.php';
include_once '../../models/subscribe/subscribe.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare subscribe object
$subscribe = new Subscribe($db);

// set ID property of record to read
$subscribe->idMember = isset($_GET['id']) ? $_GET['id'] : die();

// read the details of subscribe to be edited
$stmt = $subscribe->readOne();

if($stmt->rowCount()>0){
    $subscribes_arr=array();
    $subscribes_arr["records"]=array();

    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);

        $subscribe_item=array(
            "dateDebut" => $dateDebut,
            "dateFin" => $dateFin,
        );

        array_push($subscribes_arr["records"], $subscribe_item);
    }

    // set response code - 200 OK
    http_response_code(200);

    // make it json format
    echo json_encode($subscribes_arr);
}

else{
    // set response code - 404 Not found
    http_response_code(404);

    // tell the user subscribe does not exist
    echo json_encode(array("message" => "subscribe does not exist."));
}
?>