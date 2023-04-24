<?php
// import backend processes
require("../app/dbQuery.php"); // file navigation is important
require("../app/inputValidator.php"); // file navigation is important  

$request = $_POST["productUpdateDetail"]; // if req on POST method
$requestObject = json_decode($request);
$productID = $requestObject->productID;//product Id
$productName = $requestObject->productName; //product name
$productPrice = $requestObject->priceDouble; //product price
$productCategoryID = $requestObject->productCategoryID; //product category Id


// validate inputs
$validation = new Validator($requestObject);
$validationErrors = $validation->validator();
$validationArray = get_object_vars($validationErrors);
foreach ($validationArray as $key => $value) {
    if ($value != null) {
        echo ($value);
        die();
    }
}

// check if data exists
$database = new DB();
$checkQuery = "SELECT * FROM `item` WHERE `name`=? AND `category_id`=?";
$stmt1 = $database->prepare($checkQuery, 'si', array($productName , $productCategoryID));
$productDataRow = $stmt1->get_result();
if ($productDataRow->num_rows) {
     echo ("This product exist with the same name and Category");
     die();
}

// create Current Date time
$date = new DateTime();
$date->setTimezone(new DateTimeZone('Asia/Colombo'));
$currentNewDate = $date->format("Y-m-d H:i:s");

// Update our Database
$addQuery = "UPDATE `item` SET `name`=? , `price`=? , category_id=? ,added_datetime=? WHERE `id`=? ";
$stmt2 = $database->prepare($addQuery, 'sdisi', array($productName,$productPrice,$productCategoryID,$currentNewDate,$productID));

$response = 'Product Update success'; // if response in just text
echo ($response); // for just text responses


