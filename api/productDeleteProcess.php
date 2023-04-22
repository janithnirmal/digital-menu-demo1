<?php
// import backend processes
require("../app/dbQuery.php"); // file navigation is important

$request = $_GET["productDeleteID"]; // if req on GET method
$requestObject = json_decode($request);
$productID = $requestObject->productID;//product Id

// Delete product  our Database
$database = new DB();
$addQuery = "DELETE FROM `item` WHERE `id`=?";
$stmt2 = $database->prepare($addQuery, 'i', array($productID));

$response = 'Product Delete success'; // if response in just text
echo ($response); // for just text responses


