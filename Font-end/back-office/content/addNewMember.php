<?php 

include_once "../scripts/callApi.php";
 // add new
 $name = $address = $birthday = "";
 $name_err = $address_err = $birthday_err = "";

 if(empty(trim($_POST["name"]))){
   $name_err = "Please enter name.";
 } else{
   $name = trim($_POST["name"]);
 }

 // Check if address is empty
 if(empty(trim($_POST["address"]))){
     $address_err = "Please enter your address.";
 } else{
     $address = trim($_POST["address"]);
 }

 // Check if birthday is empty
 if(empty(trim($_POST["birthday"]))){
   $birthday_err = "Please enter your birthday.";
 } else{
   $birthday = trim($_POST["birthday"]);
 }
 $newMember = array (
   'nameMembre'=> trim($_POST["name"]),
   'addressMembre'=> trim($_POST["address"]),
   'DateNais'=> trim($_POST["birthday"])
 );
 $make_call = callAPI('POST', 'http://localhost/Gym-Website/Back-end/api/controllers/member/create.php', json_encode($newMember));

 header("location: member.php");