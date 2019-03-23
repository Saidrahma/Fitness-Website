<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// database connection will be here
// include database and object files
include_once '../../config/database.php';
include_once '../../models/member/member.php';

// instantiate database and member object
$database = new Database();
$db = $database->getConnection();

// initialize object
$member = new Member($db);

// read members will be here
// query members
$stmt = $member->read();
$num = $stmt->rowCount();

// check if more than 0 record found
if($num>0){

    // members array
    $members_arr=array();
    $members_arr["records"]=array();

    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);

        $member_item=array(
            "idMembre" => $idMembre,
            "nameMembre" => $nameMembre,
            "addressMembre" => $addressMembre,
            "DateNais" => $DateNais,
        );

        array_push($members_arr["records"], $member_item);
    }

    // set response code - 200 OK
    http_response_code(200);

    // show members data in json format
    echo json_encode($members_arr);
} else{

    // set response code - 404 Not found
    http_response_code(404);

    // tell the user no products found
    echo json_encode(
        array("message" => "No Member found.")
    );
}

// no members found will be here