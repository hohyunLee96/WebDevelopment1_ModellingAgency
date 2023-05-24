<?php
include __DIR__ . '/../header.php';
?>
    <div class="container-fluid text-center agency-header">
        <div class="row">
            <div class="col py-5">
                <h1>H Agency</h1>
                <h3>here you will find all the Model you are looking for</h3>
            </div>
        </div>
    </div>
    <section>
        <div class="container">
            <div id="infodiv">
                <span>
                      <h1 class="text-capitalize" id="ModelType"><?= $_SESSION['type'] ?></h1>
                    <h1>Model</h1>
                    <h1> <?= $_SESSION['message'] ?></h1>
                </span>
            </div>
            <div class="row" id="modelCard">
                <?php
                foreach ($model as $models) {
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="card">
                            <div class="card-body" style="height: 16rem;">
                                <img src="<?= $models->getImage() ?>"
                                     height="160" width="170" alt="pictures of model">
                                <p>Name: <?= $models->getName() ?></p>
                                <p>Age: <small><?= $models->getAge() ?></small></p>
                                <p>BirthDate: <small><?= date("d/m/Y",strtotime($models->getBirthDate())) ?></small></p>
                            </div>
                            <div class="card-footer bg-light">
                                <span class="float-start">
                                    <form action='/home/model/booking' method="POST">
                                        <input type="hidden" name="id"
                                               value="<?= $selected_id = $models->getId() ?>">
                                        <button type="submit" name="bookBtn" <?php if ($_SESSION['id'] == null)
                                        { ?> disabled <?php }
                                        else if ($_SESSION['types'] == "admin"){
                                        ?> hidden <?php
                                                }
                                                ?>class="btn btn-primary">Book</button>
                                    </form>
                                </span>
                                <span class="float-start">
                                <form action='/home/model/editing' method="POST" id="editBtn">
                                    <input type="hidden" name="id"
                                           value="<?= $_SESSION['modelId'] = $models->getId() ?>">
                                    <button type="submit"
                                            name="edit" <?php if ($_SESSION['types'] == 'client' || ($_SESSION['id'] == null)){ ?> hidden
                                            <?php } ?>class="btn btn-secondary">Edit</button>
                                </form>
                                </span>
                                <span class="float-end">
                                        <input type="hidden" id="deleteModelById" name="modelId"
                                               value="<?= $selected_id = $models->getId() ?>">
                                        <button name="deleteBtn" <?php if ($_SESSION['types'] == 'client' || ($_SESSION['id'] == null)){ ?> hidden
                                                <?php } ?>class="btn btn-secondary"
                                                onclick="deleteModel(<?= $models->getId() ?>)">Delete</button>
                                </span>

                            </div>
                        </div>
                    </div>

                    <?php
                }
                ?>
            </div>
    </section>
    <hr class="featurette-divider">
    <div class="row">
        <div class="col-lg-4">
            <img class="rounded-circle"
                 src="/image/aizaz.jpg"
                 alt="Generic placeholder image" width="140" height="140">
            <h2>Male Model</h2>
            <p>Introducing our male models, a diverse group of talented and ambitious individuals with strong and athletic builds.
                They have sharp and versatile looks, making them perfect for a wide range of projects,
                from high-end fashion campaigns to commercial print work.
                Their passion for the industry and outgoing personalities make them a joy to work with on set.</p>
            <p><a class="btn btn-secondary btnDetail" href="/home/model/male" role="button">View details »</a></p>
        </div>
        <div class="col-lg-4">
            <img class="rounded-circle"
                 src="/image/63cc63331530b.jpg"
                 alt="Generic placeholder image" width="140" height="140">
            <h2>Female Model</h2>
            <p>Our female models have striking features and natural ability to command the camera,
                making them stand out in the industry. They have experience in both the runway and photoshoots,
                and their hardworking attitudes and professionalism make them valuable assets to our agency.</p>
            <p><a class="btn btn-secondary btnDetail" href="/home/model/female" role="button">View details »</a></p>
        </div>
        <div class="col-lg-4">
            <img class="rounded-circle"
                 src="/image/63cc6b2e10940.jpg"
                 alt="Generic placeholder image" width="140" height="140">
            <h2>Curvy Model</h2>
            <p>Introducing our curvy models, a diverse group of talented and ambitious individuals with beautiful and unique figures.
                They are breaking the mold and challenging traditional beauty standards in the fashion industry.
                Their curves and confidence make them stand out on the runway and in photoshoots.
                They have a versatile look, making them perfect for a wide range of projects,
                from high-end fashion campaigns to commercial print work.</p>
            <p><a class="btn btn-secondary btnDetail" href="/home/model/curvy" role="button">View details »</a></p>
        </div>
    </div>


<?php
include __DIR__ . '/../footer.php';
?>