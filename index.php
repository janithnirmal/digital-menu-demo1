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
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Header -->
            <div class="col-12 bg-black ">
                <div class="row px-3 py-2 d-flex align-items-center">
                    <div class="col-1 bg-white rounded-2 "><img src="" alt="" class=""></div>
                    <div class="col-6 mt-2">
                        <h6 class="text-white">Brand Name</h6>
                    </div>
                    <div class="col-5 d-flex justify-content-end mt-2 ">
                        <h5 class="text-warning">Menu</h5>
                    </div>
                </div>
            </div>
            <!-- Content -->
            <div class="col-12  bg-white">
                <div class="row px-3 py-2">
                    
                    <!-- Available Unavailable buttons -->
                    <div class="col-12 bg-black rounded-5">
                        <div class="row py-2">
                            <div class="d-grid col-6">
                                <button class="btn btn-warning rounded-5">
                                    <h2 class="fs-5 mt-1 fw-bold">Available</h2>
                                </button>
                            </div>
                            <div class="col-6 d-grid text-start">
                                <button class="btn btn-transparent  rounded-5">
                                    <h2 class="fs-5 mt-1 text-white me-2">Unavailable</h2>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Item cards -->
                    <?php
                        for($y=1;$y<6;$y++){
                    ?>
                        <div class="col-12 bg-black rounded-4 mt-2 " style="overflow: hidden;">
                            <div class="row">
                                <div class="col-12 bg-danger  mb-3 item1  px-2 item4to" >
                                    <h1 class="mt-5 fw-bold fs-2 text-white ms-2">Food Item <?php echo($y); ?></h1>
                                </div>
                                <?php
                                    for($x=0;$x<5;$x++){
                                ?>
                                        <div class="col-12 ">
                                            <div class=" text-white d-flex justify-content-between ">
                                                <div class=""><p class="fs-6 fw-bold">Item Name</p></div>
                                                <div class=""><p class="fs-6 fw-bold ">$20.00</p></div>
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
            <!-- Footer -->
            <div class="col-12 bg-black  footer">
                <div class="row p-3 ">
                    <h1 class="text-center text-white fw-bold fs-1">Cafe</h1>
                    <hr class="bg-white mt-2">
                    <div class="col-12 ">
                        <div class="row  text-center">
                            <h1 class="text-warning fs-3">Contact Us</h1><br/>
                            <h1 class="text-white fs-6">cafe4you@gmail.com</h1>
                            <h1 class="text-white fs-6">+94 77 1234567</h1>
                            <h1 class="text-white fs-6">No 7, Negambo , Sri Lanka</h1>
                           
                            <h1 class="text-warning fs-3 mt-4">Socials</h1><br/>
                            <div class="col-12 mb-3">
                                <div class="row d-flex justify-content-center "  style="gap:20px;">
                                    <div class="col-2  bg-white  rounded-5" style="width:70px; height:70px;" >.</div>
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
    <script src="js/bootstrap.bundle.js"></script>
</body>
</html>