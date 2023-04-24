<?php

// import backend processes
require("../app/inputValidator.php"); // file navigation is important 
require("../app/dbQuery.php"); // file navigation is important 


$responseObject = new stdClass();

if (!isset($_GET["requestData"])) {
    $responseObject->response = "Wrong request parameter";
    echo (json_encode($responseObject));
    die();
}

$request = $_GET["requestData"]; // if req on GET method
$requestObject = json_decode($request);
$requestFrom = $requestObject->from;

// validate inputs
$validation = new Validator($requestObject);
$validationErrors = $validation->validator();
$validationArray = get_object_vars($validationErrors);
foreach ($validationArray as $key => $value) {
    if ($value != null) {
        $responseObject->response = $value;
        echo (json_encode($responseObject));
        die();
    }
}



$database = new DB();
$resultsArray = array();
$loadCategoryQuery = "SELECT * FROM `category`";
$categoriesResult = $database->query($loadCategoryQuery);
for ($c = 0; $c < $categoriesResult->num_rows; $c++) {
    $categoryResults = new stdClass();

    $categoriesData = $categoriesResult->fetch_assoc();
    $categoryName = $categoriesData["category"];
    $categoryId = $categoriesData["id"];
    $categoryImgUri = $categoriesData["img_url"];
    $categoryItems = array();

    $results;
    if ($requestFrom == 'client') {
        $requestAvailabilityType = $requestObject->availability;
        $loadItemQuery = "SELECT * FROM `item` WHERE `category_id`=? AND `availability_id`=?";
        $stmt1 = $database->prepare($loadItemQuery, 'ii', array($categoryId, $requestAvailabilityType));
        $results = $stmt1->get_result();
        // echo var_dump($results);
    } else if ($requestFrom == 'admin') {
        $loadItemQuery = "SELECT * FROM `item` WHERE `category_id`=? ";
        $stmt1 = $database->prepare($loadItemQuery, 'i', array($categoryId));
        $results = $stmt1->get_result();
    } else {
        $responseObject->response = "Wrong Parameter Data";
        echo (json_encode($responseObject));
        die();
    }

    // echo $results->num_rows;


    for ($y = 0; $y < $results->num_rows; $y++) {
        $itemData = $results->fetch_assoc();
        $itemDataObject = new stdClass();
        $itemDataObject->id = $itemData["id"];
        $itemDataObject->name = $itemData["name"];
        $itemDataObject->price = $itemData["price"];
        $itemDataObject->availability_id = $itemData["availability_id"];
        $itemDataObject->category_id = $itemData["category_id"];
        $itemDataObject->added_datetime = $itemData["added_datetime"];
        array_push($categoryItems, $itemDataObject);
    }



    //response
    $categoryResults->categoryName = $categoryName;
    $categoryResults->categoryId = $categoryId;
    $categoryResults->categoryImgUri = $categoryImgUri;
    $categoryResults->categoryItems = $categoryItems;
    array_push($resultsArray, $categoryResults);
}

$responseObject->results = $resultsArray;
echo (json_encode($responseObject));
