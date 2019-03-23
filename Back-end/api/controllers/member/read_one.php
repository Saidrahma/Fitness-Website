<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

// include database and object files
include_once '../../config/database.php';
include_once '../../models/member/member.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare member object
$member = new Member($db);

// set ID property of record to read
$member->idMembre = isset($_GET['id']) ? $_GET['id'] : die();

// read the details of member to be edited
$member->readOne();

if($member->nameMembre!=null){
    // create array
    $member_arr = array(
        "idMembre" => $member->idMembre,
        "nameMembre" => $member->nameMembre,
        "addressMembre" => $member->addressMembre,
        "DateNais" => $member->DateNais,
    );

    // set response code - 200 OK
    http_response_code(200);

    // make it json format
    echo json_encode($member_arr);
}

else{
    // set response code - 404 Not found
    http_response_code(404);

    // tell the user member does not exist
    echo json_encode(array("message" => "member does not exist."));
}
?>