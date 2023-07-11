<?php include_once 'template/head-admin.php'; ?>

<h1 class="text-center my-2">Administration du refuge</h1>

<p class="text-center">Add</p>

<div class="row justify-content-center mx-0 mb-5">
    <div class="container col-8 p-4 border">
        <form action="" method="POST" novalidate>
            <?php

            var_dump($_POST);
            var_dump($errors);

            ?>

            <div class="mb-4">
                <label for="name" class="form-label">Nom de l'animal *</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= $_POST['name'] ?? '' ?>">
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
                <label for="birthdate" class="form-label">Date de naissance</label>
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
                <textarea class="form-control" id="description" name="description" rows="3"><?= $_POST['description'] ?? '' ?></textarea>
                <div class="form-error"><?= $errors['description'] ?? '' ?></div>
            </div>


            <button type="submit" class="btn btn-primary">Enregistrer le nouveau pensionnaire</button>
        </form>
    </div>
</div>

<?php include_once 'template/footer.php'; ?>