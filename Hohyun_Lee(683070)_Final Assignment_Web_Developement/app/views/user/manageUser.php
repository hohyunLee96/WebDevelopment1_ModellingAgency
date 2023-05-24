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
                    <h1>Users</h1>
                </span>
            </div>
            <div class="row" id="userCard">
                <?php
                foreach ($user as $users) {
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="card">
                            <div class="card-body" style="height: 16rem;">
                                <img src="<?= $users->getImage() ?>"
                                     height="160" width="170" alt="pictures of model">
                                <p>Name: <?= $users->getName() ?></p>
                                <p>Type: <?= $users->getTypes() ?></p>
                            </div>
                            <div class="card-footer bg-light">
                                <span class="float-start">
                                <form action='/home/user/editing' method="POST" id="editUserBtn">
                                    <input type="hidden" name="id"
                                           value="<?= $_SESSION['modelId'] = $users->getId() ?>">
                                    <button type="submit"
                                            name="editUser" class="btn btn-secondary">Edit</button>
                                </form>
                                </span>
                                <span class="float-end">
                                        <input type="hidden" id="deleteUserById" name="id" value="<?= $users->getId() ?>">
                                        <button
                                            name="deleteUserBtn" class="btn btn-secondary" onclick="deleteUser(<?= $users->getId() ?>)">Delete</button>
                                </span>

                            </div>
                        </div>
                    </div>

                    <?php
                }
                ?>
            </div>
    </section>


<?php
include __DIR__ . '/../footer.php';
?>