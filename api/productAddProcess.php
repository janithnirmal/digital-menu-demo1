<?php
// import backend processes
require("../app/dbQuery.php"); // file navigation is important
require("../app/inputValidator.php"); // file navigation is important  

$request = $_POST["productDetail"]; // if req on POST method
$requestObject = json_decode($request);
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
$checkQuery = "SELECT * FROM `item` WHERE `name`=?";
$stmt1 = $database->prepare($checkQuery, 's', array($productName));
$productDataRow = $stmt1->get_result();
if ($productDataRow->num_rows) {
     echo ("This product exist with the same name");
     die();
}

// create Current Date time
$date = new DateTime();
$date->setTimezone(new DateTimeZone('Asia/Colombo'));
$currentNewDate = $date->format("Y-m-d H:i:s");

// data Insert our Database
$addQuery = "INSERT INTO `item` (`name`,`price`, `availability_id`,`category_id`,`added_datetime`)  VALUE (?,?,?,?,?)";
$stmt2 = $database->prepare($addQuery, 'sdiis', array($productName,$productPrice,1,$productCategoryID,$currentNewDate));

$response = 'success'; // if response in just text
echo ($response); // for just text responses


