<?php
// import backend processes
require("../app/inputValidator.php"); // file navigation is important 
require("../app/dbQuery.php"); // file navigation is important 

// user access validation by check if the user is logged in from the request source. (if needed)
$responseObject = new stdClass();

// get the request data
if (!isset($_POST["categoryData"])) {
    $responseObject->response = "Invalid Request Parameter";
    echo (json_encode($responseObject));
    die();
}

$requestData = $_POST["categoryData"]; // if req on POST method
$requestObject = json_decode($requestData);
$categoryId = $requestObject->id;
$category = $requestObject->category;
$categoryImgUrl = '';


if (isset($category)) {

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

    // check if data exists
    $database = new DB();
    $checkQuery = "SELECT * FROM `category` WHERE `id`=?";
    $stmt1 = $database->prepare($checkQuery, 'i', array($categoryId));
    $categoryDataRow = $stmt1->get_result();
    if (!$categoryDataRow->num_rows) {
        $responseObject->response = "Wrong Category Id";
        echo (json_encode($responseObject));
        die();
    }
}


if (isset($_FILES["categoryImage"])) {
    $requestFile = $_FILES["categoryImage"]; // if req on POST method

    $img_type = $requestFile["type"];
    if ($img_type == 'image/jpeg') {
        $img_type = '.jpg';
    } else if ($img_type == 'image/png') {
        $img_type = '.png';
    } else if ($img_type == 'image/svg+xml') {
        $img_type = '.svg';
    } else {
        $responseObject->response = "Wrong file type. only allow jpg, png, svg";
        echo (json_encode($responseObject));
        die();
    }

    $img_tmpname = $requestFile["tmp_name"];
    $img_name = $category . $img_type;
    $new_location = '../resources/images/category/' . $img_name;
    $uplaoded = move_uploaded_file($img_tmpname, $new_location);
    if (!$uplaoded) {
        $responseObject->response = "Image upload failed";
        echo (json_encode($responseObject));
        die();
    }

    $categoryImgUrl = $img_name;
}




// add data to the DB
if ($category && $categoryImgUrl) {
    $updateQuery = "UPDATE `category` SET `category`=? , `img_url`=? WHERE `id`=?";
    $stmt2 = $database->prepare($updateQuery, 'ssi', array($category, $categoryImgUrl, $categoryId));
} else if ($category) {
    $updateQuery = "UPDATE `category` SET `category`=? WHERE `id`=?";
    $stmt2 = $database->prepare($updateQuery, 'si', array($category, $categoryId));
} else if ($categoryImgUrl) {
    $updateQuery = "UPDATE `category`SET `img_url`=? WHERE `id`=?";
    $stmt2 = $database->prepare($updateQuery, 'si', array($categoryImgUrl, $categoryId));
}

$responseObject->response = "success";
echo (json_encode($responseObject));
