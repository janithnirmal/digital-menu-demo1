<?php

$availablity = 1;
if (isset($_GET["param"])) {
    if ($_GET["param"] == 'available') {
        $availablity = 1;
    } else if ($_GET["param"] == 'unavailable') {
        $availablity = 2;
    }
}

// Set the API endpoint URL
// $url = '127.0.0.1/digital-menu-demo1/api/productLoadProcess.php?requestData={"from":"client","availability":1}'; // madusha
$url = '127.0.0.1/personal/menu-projects/demo/digital-menu-demo1/api/productLoadProcess.php?requestData={"from":"client","availability":' . $availablity . '}'; // janith

// Initialize a new curl session
$curl = curl_init();

// Set the curl options
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_URL => $url
));

// Execute the curl session
$response = curl_exec($curl);

// Check for errors
if (curl_errno($curl)) {
    echo 'Error: ' . curl_error($curl);
}

// Close the curl session
curl_close($curl);

// echo $response;
// Display the response from the API
$resultObject =  json_decode($response)->results;
foreach ($resultObject as $categoryObject) {
    $categoryItems = $categoryObject->categoryItems;
?>
    <div class="col-12 col-lg-6 offset-lg-3 bg-dark rounded-4 my-2 " style="overflow: hidden;">
        <div class="row mb-2">
            <div class="position-relative mb-3 p-0  item-image" style="background-image: url('resources/images/category/<?php echo $categoryObject->categoryImgUri ?>');">
                <div class="h-100 w-100 position-absolute dark-gradiant"></div>
                <div class="w-100 col-12 mb-1 item1  px-1 d-flex align-items-end">
                    <h1 onclick="contentChanger('updateCategory.php?id=1');" class="fw-bold fs-2  category-title ms-2 underline-hover"><?php echo ($categoryObject->categoryName) ?></h1>
                </div>
            </div>
            <?php
            echo (count($categoryItems) == 0) ? "<p class='fw-bold text-secondary'>No Meal to Load... </p>" : null;

            foreach ($categoryItems as $categoryItemsObject) {
            ?>
                <div class="col-12 my-1">
                    <div class=" text-white h-100 d-flex justify-content-between">
                        <div class="h-100 d-flex justify-content-center align-items-center py-1 p-0 m-0">
                            <p class="p-0 m-0 fs-6 fw-bold" id="idd"><?php echo ($categoryItemsObject->name) ?></p>
                        </div>
                        <div class="h-100 d-flex justify-content-center align-items-center py-1 p-0 m-0 ">
                            <p class="p-0 m-0 fs-6 fw-bold">$<?php echo ($categoryItemsObject->price); ?>.00</p>
                            <div class="item-add-from-menu-btn mx-3">
                                <i class="c-add-icon bi bi-plus-circle-fill"></i>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
<?php
}
?>