<?php include_once 'template/head-admin.php'; ?>

<h1 class="text-center mt-4 mb-2 font-pangolin">Administration du refuge</h1>

<p class="text-center font-pangolin">Ajout d'un pensionnaire</p>

<div class="row justify-content-center mx-0 mb-5">
    <div class="container col-8 p-4 rounded shadow bg-light">

        <?php if ($showForm) { ?>

            <form action="" method="POST" novalidate>

                <div class="form-error my-2 text-center"><?= $errors['bdd'] ?? '' ?></div>

                <div class="mb-4">
                    <label for="birthdate" class="form-label">Date d'arrivée *</label>
                    <input type="date" class="form-control" name="arrivaldate" id="arrivaldate" value=<?= $_POST['arrivaldate'] ?? date('Y-m-d') ?>>
                    <div class="form-error"><?= $errors['arrivaldate'] ?? '' ?></div>
                </div>


                <div class="mb-4">
                    <label for="name" class="form-label">Nom de l'animal *</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="ex. Rintintin" value="<?= $_POST['name'] ?? '' ?>">
                    <div class="form-error"><?= $errors['name'] ?? '' ?></div>
                </div>


                <label for="specie" class="form-label">Type d'animal *</label>
                <select class="form-select form-select-sm" name="specie" id="specie">
                    <option value="" selected disabled>Choix du type</option>
                    <?php foreach (Species::getSpecies() as $specie) { ?>
                        <option value="<?= $specie['spe_id'] ?>" <?= isset($_POST['specie']) && $_POST['specie'] == $specie['spe_id'] ? 'selected' : '' ?>><?= ucfirst($specie['spe_name']) ?></option>
                    <?php } ?>
                </select>
                <div class="form-error mb-4"><?= $errors['specie'] ?? '' ?></div>


                <label for="sex" class="form-label">Sexe de l'animal *</label>
                <select class="form-select form-select-sm" name="sex" id="sex">
                    <option value="" selected disabled>Choix du sexe</option>
                    <option value="m" <?= isset($_POST['sex']) && $_POST['sex'] == 'm' ? 'selected' : '' ?>>Male</option>
                    <option value="f" <?= isset($_POST['sex']) && $_POST['sex'] == 'f' ? 'selected' : '' ?>>Femelle</option>
                </select>
                <div class="form-error mb-4"><?= $errors['sex'] ?? '' ?></div>


                <label for="color" class="form-label">Couleur de l'animal *</label>
                <select class="form-select form-select-sm" name="color" id="color">
                    <option value="" selected disabled>Choix de la couleur</option>
                    <?php foreach (Colors::getAllColors() as $color) { ?>
                        <option value="<?= $color['col_id'] ?>" <?= isset($_POST['color']) && $_POST['color'] == $color['col_id'] ? 'selected' : '' ?>><?= ucfirst($color['col_name']) ?></option>
                    <?php } ?>
                </select>
                <div class="form-error mb-4"><?= $errors['color'] ?? '' ?></div>


                <label for="breed" class="form-label">Race de l'animal *</label>
                <select class="form-select form-select-sm" name="breed" id="breed">
                    <option value="" selected disabled>Choix de la race</option>
                    <?php foreach (Breeds::getBreeds() as $breed) { ?>
                        <option value="<?= $breed['bre_id'] ?>" <?= isset($_POST['breed']) && $_POST['breed'] == $breed['bre_id'] ? 'selected' : '' ?>><?= ucfirst($breed['bre_name']) ?></option>
                    <?php } ?>
                </select>
                <div class="form-error mb-4"><?= $errors['breed'] ?? '' ?></div>

                <div class="mb-4">
                    <label for="weight" class="form-label">Poids (En gramme) *</label>
                    <input type="text" class="form-control" name="weight" id="weight" value=<?= $_POST['weight'] ?? '' ?>>
                    <div class="form-error"><?= $errors['weight'] ?? '' ?></div>
                </div>

                <div class="mb-4">
                    <label for="birthdate" class="form-label">Date de naissance *</label>
                    <input type="date" class="form-control" name="birthdate" id="birthdate" value=<?= $_POST['birthdate'] ?? '' ?>>
                    <div class="form-error"><?= $errors['birthdate'] ?? '' ?></div>
                </div>


                <label class="form-label">Informations</label>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="microchipped" name="microchipped" value="1" <?= isset($_POST['microchipped']) && $_POST['microchipped'] == 1 ? 'checked' : '' ?>>
                    <label class="form-check-label" for="microchipped">Pucé(e)</label>
                </div>


                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="tattooed" name="tattooed" value="1" <?= isset($_POST['tattooed']) && $_POST['tattooed'] == 1 ? 'checked' : '' ?>>
                    <label class="form-check-label" for="tatooed">Tatoué(e)</label>
                </div>


                <div class="mb-4 form-check">
                    <input type="checkbox" class="form-check-input" id="vaccinated" name="vaccinated" value="1" <?= isset($_POST['vaccinated']) && $_POST['vaccinated'] == 1 ? 'checked' : '' ?>>
                    <label class="form-check-label" for="vaccinated">Vacciné(e)</label>
                </div>


                <div class="mb-4">
                    <label for="description" class="form-label">Description *</label>
                    <textarea class="form-control" id="description" name="description" placeholder="ex. Gentil et calin ... " rows="3"><?= $_POST['description'] ?? '' ?></textarea>
                    <div class="form-error"><?= $errors['description'] ?? '' ?></div>
                </div>


                <button type="submit" class="btn btn-primary font-pangolin">Enregistrer le nouveau pensionnaire</button>
                <a href="../controllers/controller-admin.php" class="btn btn-outline-secondary font-pangolin">Annuler</a>

            </form>

        <?php } else { ?>
            <!-- Nous indiquons que tout est ok -->
            <p class="text-center font-pangolin h3">Le nouveau pensionnaire a bien été ajouté <?= isset($_POST['specie']) && $_POST['specie'] == 2 ? '<i class="fa-solid fa-cat"></i>' : '<i class="fa-solid fa-dog"></i>' ?></p>
            <div class="text-center">
                <a href="../controllers/controller-add.php" class="btn btn-primary font-pangolin m-1">Ajouter un nouveau pensionnaire</a>
                <a href="../controllers/controller-admin.php" class="btn btn-secondary font-pangolin m-1">Retour Menu</a>
            </div>

        <?php } ?>








    </div>
</div>

<?php include_once 'template/footer.php'; ?>