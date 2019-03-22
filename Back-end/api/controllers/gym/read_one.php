<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

// include database and object files
include_once '../../config/database.php';
include_once '../../models/gym/gym.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare gym object
$gym = new Gym($db);

// set ID property of record to read
$gym->idSalle = isset($_GET['id']) ? $_GET['id'] : die();

// read the details of gym to be edited
$gym->readOne();

if($gym->nameSalle!=null){
    // create array
    $gym_arr = array(
        "idSalle" => $gym->idSalle,
        "nameSalle" => $gym->nameSalle,
        "addressSalle" => $gym->addressSalle,
        "townSalle" => $gym->townSalle,
    );

    // set response code - 200 OK
    http_response_code(200);

    // make it json format
    echo json_encode($gym_arr);
}

else{
    // set response code - 404 Not found
    http_response_code(404);

    // tell the user gym does not exist
    echo json_encode(array("message" => "gym does not exist."));
}
?>