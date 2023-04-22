<?php
// import backend processes
require("../app/dbQuery.php"); // file navigation is important

$request = $_GET["productAvailabilityDetail"]; // if req on GET method
$requestObject = json_decode($request);
$productID = $requestObject->productID;//product Id
$availabilityID = $requestObject->availabilityID; //Status Id(availabilityID)

// Update our Database
$database = new DB();
$addQuery = "UPDATE `item` SET `availability_id`=?  WHERE `id`=? ";
$stmt2 = $database->prepare($addQuery, 'ii', array($availabilityID,$productID));

$response = 'Product Availability Change'; // if response in just text
echo ($response); // for just text responses


