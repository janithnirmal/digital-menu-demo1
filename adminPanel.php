<?php
session_start();
if (isset($_SESSION["menudemo1admin"])) {
    $USER_DATA = $_SESSION['menudemo1admin'];
} else {
    header("Location:signIn.php");
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
</head>

<body style="background-color: #0f0f0f;">
    <div class="container-fluid">
        <div class="row">
            <!-- Nav Bar -->
            <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark gap-3">
                <div class="container-fluid">
                    <button class="navbar-toggler p-0 m-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <!-- <a class="navbar-brand w-100 fw-bold bg-danger" href="#">LOGO</a> -->
                    <div class="collapse p-0 m-0 navbar-collapse" id="navbarNavDropdown">
                        <div class="navbar-nav w-100 p-0 m-0 d-flex justify-content-around align-items-center w-100">
                            <div class="nav my-1 -item w-100">
                                <a class="nav-link active text-center w-100 text-white fw-bold" aria-current="page" href="#">My Profile</a>
                            </div>

                            <div class="nav-item w-100  my-1 ">
                                <a class="btn btn-secondary nav-link text-warning fw-bold " href="index.php">All</a>
                            </div>

                            <div class="nav-item dropdown w-100 my-1 ">
                                <a class="btn btn-secondary nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Add New
                                </a>
                                <ul class="dropdown-menu mt-1">
                                    <li><a onclick="contentChanger('addProduct')" class="dropdown-item" href="#">Add New Product</a></li>
                                    <li><a onclick="contentChanger('addCategory')" class="dropdown-item" href="#">Add New Category</a></li>
                                </ul>
                            </div>

                            <div class="btn btn-secondary w-100 my-1  nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Other
                                </a>
                                <ul class="dropdown-menu mt-1">
                                    <li><a onclick="contentChanger('allProductView')" class="dropdown-item" href="#">Product list</a></li>
                                    <li><a onclick="contentChanger('categoryList')" class="dropdown-item" href="#">Category List</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="nav-item my-1">
                            <button class="bg-warning btn" onclick="logOutAdmin();">Log Out</button>
                        </div>
                    </div>
                </div>
            </nav>
            <!--  -->
            <div class="col-12 p-0">
                <div class="row m-0 py-3 px-2" id="adminContentContainer">
                    <?php
                    include 'templates/allProductView.php';
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script src="js/admin.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
</body>

</html>