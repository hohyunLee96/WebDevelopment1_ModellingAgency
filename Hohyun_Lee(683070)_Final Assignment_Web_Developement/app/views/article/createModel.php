<?php
include __DIR__ . '/../header.php';
//?>

<?php

//echo $selected_id = $_POST['id'];
?>
<form method="POST" enctype="multipart/form-data">
    <h1 class="modelCreate">Create Model</h1>
    <section class="vh-100 cardBackground">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black h-100" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <form class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                    <h1><?= $errorMessage ?></h1>
                                    <p textclass="-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Create Model</p>
                                    <form class="mx-1 mx-md-4" method="post" enctype="multipart/form-data">
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" name="createModelName" id="form3Example4c"
                                                       class="form-control">
                                                <label class="form-label" for="form3Example4c">name</label>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" name="createModelAge" id="form3Example3c"
                                                       class="form-control"/>
                                                <label class="form-label" for="form3Example3c">Age</label>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <select name="createModelType" id="form3Example4c" class="form-control">
                                                    <option value="male">Male</option><option value="female">Female</option>
                                                    <option value="curvy">Curvy</option>
                                                    <option value="vegetarian">Vegetarian</option>
                                                </select>
                                                <label class="form-label" for="form3Example4c">Type</label>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="date" name="createModelBirthDate" id="form3Example3c"
                                                       class="form-control"/>
                                                <label class="form-label" for="form3Example3c">Birth Date</label>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="file" name="createModelImage" id="form3Example3c"
                                                       class="form-control" accept=".jpg, .jpeg, .png" value=""/>
                                                <label class="form-label" for="form3Example3c">Select Image</label>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="submit" name="createBtn" class="btn btn-primary">Create
                                                Model
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                                         class="img-fluid" alt="Sample image">
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
include __DIR__ . '/../footer.php';
?>


