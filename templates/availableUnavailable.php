<div class="container-fluid">
    <div class="row">
        <div class="bg-dark" id="">
            <h1 class="fw-bold text-warning fs-1 text-center p-2" id="">Available Products</h1>
        </div>
    </div>
</div>
<div class="container">
    <div class="row p-2">

        <!-- Item cards -->
        <?php
        for ($y = 1; $y < 6; $y++) {
        ?>
            <div class="col-12 bg-dark rounded-4 mt-2 " style="overflow: hidden;">
                <div class="row mb-2">
                    <div class="col-12 bg-secondary  mb-3 item1  px-2 item4to">
                        <h1 class="mt-5 fw-bold fs-2 text-white ms-2">Food Item <?php echo ($y); ?></h1>
                    </div>
                    <?php
                    for ($x = 0; $x < 5; $x++) {
                    ?>
                        <div class="col-12 ">
                            <div class=" text-white d-flex justify-content-between ">
                                <div class="">
                                    <p class="fs-6 fw-bold">Item Name</p>
                                </div>
                                <div class="">
                                    <button class="btn btn-warning mb-2 fw-bold">Available</button>
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