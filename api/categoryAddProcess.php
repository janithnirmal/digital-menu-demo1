<?php
// import backend processes
require("../app/inputValidator.php"); // file navigation is important 
require("../app/dbQuery.php"); // file navigation is important 

// user access validation by check if the user is logged in from the request source. (if needed)

// get the request data
$requestData = $_POST["categoryName"]; // if req on POST method
$requestObject = json_decode($requestData);
$category = $requestObject->category;

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

if (!isset($_FILES["categoryImage"])) {
    echo ("Please add an image to this category");
    die();
}
$requestFile = $_FILES["categoryImage"]; // if req on POST method



// check if data exists
$database = new DB();
$checkQuery = "SELECT * FROM `category` WHERE `category`=?";
$stmt1 = $database->prepare($checkQuery, 's', array($category));
$categoryDataRow = $stmt1->get_result();
if ($categoryDataRow->num_rows) {
    echo ("Category exist with the same name");
    die();
}



$img_type = $requestFile["type"];
if ($img_type == 'image/jpeg') {
    $img_type = '.jpg';
} else if ($img_type == 'image/png') {
    $img_type = '.png';
} else if ($img_type == 'image/svg+xml') {
    $img_type = '.svg';
} else {
    echo ("wrong file type");
    die();
}

$img_tmpname = $requestFile["tmp_name"];
$img_name = $category . $img_type;
$new_location = '../resources/images/category/' . $img_name;
$uplaoded = move_uploaded_file($img_tmpname, $new_location);
if (!$uplaoded) {
    echo ("Image upload Failed");
    die();
}


// add data to the DB
$addQuery = "INSERT INTO `category` (`category`, `img_url`)  VALUE (?, ?)";
$stmt2 = $database->prepare($addQuery, 'ss', array($category, $img_name));

$response = 'success'; // if response in just text
echo ($response); // for just text responses
