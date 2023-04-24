<div class="container-fluid">
    <div class="row">
        <div class="bg-dark">
            <h1 class="fw-bold text-warning fs-2 text-center p-2">All Products</h1>
        </div>
    </div>
</div>

<div class="container p-0">
    <div class="row m-0 p-2 px-3">
        <!-- Item cards -->


        <?php

        // Set the API endpoint URL
        $url = '127.0.0.1/personal/menu-projects/demo/digital-menu-demo1/api/productLoadProcess.php?requestData={"from":"admin"}';

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
                    echo (count($categoryItems) == 0) ? "<p class='fw-bold fs-6 text-white'>No Meal to Load... </p>" : null;

                    foreach ($categoryItems as $categoryItemsObject) {
                    ?>
                        <div class="col-12 my-1">
                            <div class=" text-white h-100 d-flex justify-content-between ">
                                <div class="h-100 d-flex justify-content-center align-items-center p-0 m-0">
                                    <p class="underline-hover p-0 m-0 fs-6 fw-bold" id=""><?php echo ($categoryItemsObject->name) ?></p>
                                </div>
                                <div class="h-100 d-flex justify-content-center align-items-center ">
                                    <?php
                                    if ($categoryItemsObject->availability_id == 1) {
                                    ?>
                                        <button class="btn btn-secondary fw-bold" id="">available</button>
                                    <?php
                                    } else {
                                    ?>
                                        <button class="btn btn-warning fw-bold" id="">Unavailable</button>
                                    <?php
                                    }

                                    ?>
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

    </div>
</div>