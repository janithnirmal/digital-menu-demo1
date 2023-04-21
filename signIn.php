<?php
session_start();
if (isset($_SESSION["menudemo1admin"])) {
    $USER_DATA = $_SESSION['menudemo1admin'];
    header("Location:adminPanel.php");
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/bootstrap.css" />
</head>

<body style="background-color: #0f0f0f;">
    <div class="container-fluid">
        <div class="row">
            <!--  -->
            <div class="col-12 p-0 d-flex justify-content-center align-items-center" style="height: 100vh;">
                <div class="row m-0 p-3 ">
                    <div class="col-12 col-lg-4 offset-lg-4 p-0 rounded-4 bg-dark">
                        <div class="row m-0 p-3 text-white ">
                            <span class="fs-4 fw-bold text-center py-2">Sign In</span>
                            <div class="col-12 p-0">
                                <div class="row m-0">
                                    <label class="form-label">Mobile</label>
                                    <input type="text" class="form-control" id="mobile" placeholder="Enter your mobile no" />
                                </div>
                            </div>
                            <div class="col-12 p-0">
                                <div class="row m-0">
                                    <label class="form-label">password</label>
                                    <input type="text" class="form-control" id="password" placeholder="Enter your password" />
                                </div>
                            </div>
                            <div class="col-12 p-0">
                                <div class="row m-0 py-3">
                                    <button class="btn btn-primary" onclick="signIn();" id="signInBtn">Sign In</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/admin.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
</body>

</html>