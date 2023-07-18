<?php include_once 'template/head-admin.php'; ?>


<?php if (isset($errors['message'])) { ?>

    <div class="alert alert-success mt-2 mx-1" role="alert">
        <?= $errors['message'] ?>
    </div>

<?php } ?>

<h1 class="text-center mt-3 mb-2 font-pangolin">Administration du refuge</h1>

<p class="text-center font-pangolin">Liste des pensionnaires</p>

<div class="row justify-content-center mx-0 mb-5">

    <div class="table-responsive container col-lg-8 col-11 p-3 rounded shadow bg-light">
        <table class="table rounded text-start">
            <thead class="table-secondary font-pangolin">
                <tr>
                    <th class="px-4">Date d'arrivée</th>
                    <th>Nom</th>
                    <th>Type</th>
                    <th>Race</th>
                    <th class="text-center">Réservé(e)</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <!-- je parcours le tableau des animaux recupérer à l'aide de la methode static  -->
                <?php foreach (Animals::getAllAnimals() as $animal) { ?>
                    <tr class="align-middle fs-6">
                        <td class="px-4"><?= $animal['arrivaldate'] ?></td>
                        <td><?= ucfirst($animal['ani_name']) ?></td>
                        <td><?= ucfirst($animal['spe_name']) ?></td>
                        <td><?= ucfirst($animal['bre_name']) ?></td>
                        <td class="text-center"><?= $animal['ani_reserved'] == 0 ? 'Non' : 'Oui' ?></td>
                        <td class="text-center">
                            <a href="#" class="btn btn-sm btn-outline-secondary me-1">+ d'Infos</a>
                            <a href="../controllers/controller-update.php?id=<?= $animal['ani_id'] ?>" class="btn btn-sm my-btn-update me-1">Modifier</a>
                            <button class="btn btn-sm my-btn-delete me-1" data-bs-toggle="modal" data-bs-target="#deleteModal-<?= $animal['ani_id'] ?>">Archiver</button>
                        </td>
                    </tr>

                    <!-- Modal pour l'archivage du pensionnaire -->
                    <div class="modal fade" id="deleteModal-<?= $animal['ani_id'] ?>" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5">Archivage</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Souhaitez vous archiver le pensionnaire : <b><?= $animal['ani_name'] ?></b> ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Annuler</button>
                                    <a href="../controllers/controller-list.php?action=delete&id=<?= $animal['ani_id'] ?>" class="btn btn-danger btn-sm">Archiver</a>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php  } ?>
            </tbody>
        </table>
        <div class="text-center py-2">
            <a href="../controllers/controller-admin.php" class="btn btn-secondary">Retour Menu</a>
        </div>

    </div>
</div>

<?php include_once 'template/footer.php'; ?>