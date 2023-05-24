<?php
include __DIR__ . '/../header.php';
//?>
<form method="POST" enctype="multipart/form-data">
<section class="vh-100 cardBackground">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <?php
                            foreach ($modelById as $modelByIds) {
                            ?>
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Booking <?= $modelByIds->getName()?></p>
                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4"><?= $errorMessage ?></p>
                                <div class="d-flex flex-row align-items-center mb-4">
                                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                    <div class="form-outline flex-fill mb-0">
                                        <input type="date" name="bookingDate" id="form3Example3c"
                                               class="form-control"/>
                                        <label class="form-label" for="form3Example3c">Booking Date</label>
                                    </div>
                                </div>
                                    <form method="POST">
                                        <input type="hidden" name="id"
                                               value="<?= $selected_id ?>">
                                        <button type="submit" name="requestBtn" class="btn btn-primary">Request
                                            Booking
                                        </button>
                                    </form>
                                </div>
                            </div>
                        <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                            <img class ="edmitModelImage" src="<?= $modelByIds->getImage() ?>"
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</form>
</body>
</html>
<?php
} ?>



