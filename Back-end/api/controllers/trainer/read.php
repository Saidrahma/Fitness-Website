<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// database connection will be here
// include database and object files
include_once '../../config/database.php';
include_once '../../models/trainer/trainer.php';

// instantiate database and trainer object
$database = new Database();
$db = $database->getConnection();

// initialize object
$trainer = new Trainer($db);

// read trainers will be here
// query trainers
$stmt = $trainer->read();
$num = $stmt->rowCount();

// check if more than 0 record found
if($num>0){

    // trainers array
    $trainers_arr=array();
    $trainers_arr["records"]=array();

    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);

        $trainer_item=array(
            "idTrainer" => $idTrainer,
            "nameTrainer" => $nameTrainer,
            "addressTrainer" => $addressTrainer,
        );

        array_push($trainers_arr["records"], $trainer_item);
    }

    // set response code - 200 OK
    http_response_code(200);

    // show trainers data in json format
    echo json_encode($trainers_arr);
} else{

    // set response code - 404 Not found
    http_response_code(404);

    // tell the user no products found
    echo json_encode(
        array("message" => "No trainer type found.")
    );
}

// no trainers found will be here