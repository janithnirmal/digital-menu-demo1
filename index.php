<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu UI</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/bootstrap.css" />
</head>

<body class="bg-black" onload="menuLoad('');">
    <div class="container-fluid">
        <div class="row">
            <!-- Header -->
            <div class="col-12 bg-dark py-2">
                <div class="row px-3 py-1 d-flex align-items-center">
                    <div class="col-3 p-0 fw-bold text-white rounded-2 ">LOGO</div>
                    <div class="col-6">
                        <h6 class="text-white">Brand Name</h6>
                    </div>
                    <div class="col-3 d-flex justify-content-end">
                        <h5 class="text-warning">Menu</h5>
                    </div>
                </div>
            </div>
            <!-- Content -->
            <div class="col-12">
                <div class="row px-1 py-1">

                    <!-- Available Unavailable buttons -->
                    <div class="offset-lg-3 col-lg-6 col-12 p-0">
                        <div class="row m-0 p-2">
                            <div class="col-12 bg-dark rounded-5 p-0">
                                <div class="row p-2 m-0">
                                    <div class="d-grid col-6 p-0 ">
                                        <div class="row m-0 pe-1 p-0">
                                            <button id="btn1" onclick="availableBtnColorChanger(event); menuLoad('available')" class="btn text-dark btn-warning rounded-5 fw-bold">Available</button>
                                        </div>
                                    </div>
                                    <div class="col-6 p-0 d-grid text-start ">
                                        <div class="row m-0 ps-1 p-0 ">
                                            <button id="btn2" onclick="availableBtnColorChanger(event); menuLoad('unavailable')" class="btn text-white btn-transparent fw-bold rounded-5">Unavailable</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Item cards -->
                    <div class="container p-0 m-0">
                        <div class="row m-0 p-2" id="menuMainContainer">
                            <!-- Item cards -->




                        </div>
                    </div>

                </div>
            </div>
            <!-- Footer -->
            <div class="col-12 bg-black  footer">
                <div class="row p-3 ">
                    <h1 class="text-center text-white fw-bold fs-1">Cafe</h1>
                    <hr class="bg-white mt-2">
                    <div class="col-12 ">
                        <div class="row  text-center">
                            <h1 class="text-warning fs-3">Contact Us</h1><br />
                            <h1 class="text-white fs-6">cafe4you@gmail.com</h1>
                            <h1 class="text-white fs-6">+94 77 1234567</h1>
                            <h1 class="text-white fs-6">No 7, Negambo , Sri Lanka</h1>

                            <h1 class="text-warning fs-3 mt-4">Socials</h1><br />
                            <div class="col-12 mb-3">
                                <div class="row d-flex justify-content-center " style="gap:20px;">
                                    <div class="col-2  bg-white  rounded-5" style="width:70px; height:70px;">.</div>
                                    <div class="col-2  bg-white rounded-5" style="width:70px; height:70px;">.</div>
                                    <div class="col-2  bg-white rounded-5" style="width:70px; height:70px;">.</div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <script src="js/script.js"></script>
</body>

</html>