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

<body class="bg-danger" style="background-color: red;">
    <div class="container-fluid">
        <div class="row">
            <!-- Nav Bar -->
            <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark gap-3">
                <div class="container-fluid gap-3">
                    <a class="navbar-brand" href="#"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active text-white" aria-current="page" href="#">My Profile</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-warning fw-bold " href="index.php">All</a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Add New
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Add New Product</a></li>
                                    <li><a class="dropdown-item" href="#">Add New Category</a></li>
                                </ul>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Edit & Customizations
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Edit Product</a></li>
                                    <li><a class="dropdown-item" href="#">Edit Category</a></li>
                                </ul>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Other
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Available</a></li>
                                    <li><a class="dropdown-item" href="#">Unavailable</a></li>
                                    <li><a class="dropdown-item" href="#">Category List</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!--  -->
            <div class="col-12 p-0 bg-dark">
                <div class="row m-0" id="adminContentContainer">
                    <?php
                    include 'templates/addCategory.php';
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script src="js/script.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
</body>

</html>