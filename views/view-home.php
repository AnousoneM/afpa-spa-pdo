<?php include_once 'template/head.php'; ?>

<div id="pensionnaires" class="container my-4 p-3 font-pangolin">
    <h2 class="ms-2 mb-4 big-h2">Nos Pensionnaires</h2>

    <div class="row mx-0 justify-content-evenly">

        <?php foreach (Animals::getAllAnimals() as $animal) { ?>

            <div class="col-md-5 col-lg-5">
                <div class="row bg-light g-0 border border-secondary-subtle rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary-emphasis"><?= $animal['bre_name'] ?></strong>
                        <P class="h3 mb-0"><?= $animal['ani_name'] ?></P>
                        <div class="mb-1 text-body-secondary"><?= $animal['birthdate'] ?></div>
                        <p class="card-text mb-auto"><?= $animal['ani_description'] ?></p>
                        <a href="../controllers/controller-details.php" class="icon-link gap-1 icon-link-hover stretched-link text-decoration-none">
                            Plus d'infos
                        </a>
                    </div>
                    <div class="col-auto">
                        <img src="../assets/img/cat.webp" alt="Image d'un <?= $animal['spe_name'] ?>" class="bd-placeholder-img img-pet" />
                    </div>
                </div>
            </div>

        <?php } ?>

        <div class="col-md-5 col-lg-5">
            <div class="row bg-light g-0 border border-secondary-subtle rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <strong class="d-inline-block mb-2 text-primary-emphasis">Race</strong>
                    <P class="h3 mb-0">DOUG</P>
                    <div class="mb-1 text-body-secondary">05-05-2023</div>
                    <p class="card-text mb-auto">Petit chien adorable</p>
                    <a href="../controllers/controller-details.php" class="icon-link gap-1 icon-link-hover stretched-link text-decoration-none">
                        Plus d'infos
                    </a>
                </div>
                <div class="col-auto">
                    <img src="https://picsum.photos/200/250" alt="..." class="bd-placeholder-img img-fluid" />
                </div>
            </div>
        </div>

        <div class="col-md-5 col-lg-5">
            <div class="row bg-light g-0 border border-secondary-subtle rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <strong class="d-inline-block mb-2 text-primary-emphasis">Race</strong>
                    <P class="h3 mb-0">DOUG</P>
                    <div class="mb-1 text-body-secondary">05-05-2023</div>
                    <p class="card-text mb-auto">Petit chien adorable</p>
                    <a href="../controllers/controller-details.php" class="icon-link gap-1 icon-link-hover stretched-link text-decoration-none">
                        Plus d'infos
                    </a>
                </div>
                <div class="col-auto">
                    <img src="https://picsum.photos/200/250" alt="..." class="bd-placeholder-img img-fluid" />
                </div>
            </div>
        </div>


    </div>
</div>

<?php include_once 'template/footer.php'; ?>