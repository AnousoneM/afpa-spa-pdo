<?php include_once 'template/head-admin.php'; ?>

<h1 class="text-center mt-4 mb-2 font-pangolin">Administration du refuge</h1>

<p class="text-center font-pangolin">Liste des pensionnaires</p>

<div class="row justify-content-center mx-0 mb-5">
    <div class="container col-7 p-3 rounded shadow bg-light">
        <table class="table rounded text-start">
            <thead class="table-secondary font-pangolin">
                <tr>
                    <th>Date d'arrivée</th>
                    <th>Nom</th>
                    <th>Type</th>
                    <th>Race</th>
                    <th>Réservé</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <!-- je parcours le tabbleau des animaux recupérer à l'aide de la methode static  -->
                <?php foreach (Animals::getAllAnimals() as $animal) { ?>
                    <tr class="align-middle fs-6">
                        <td><?= $animal['arrivaldate'] ?></td>
                        <td><?= ucfirst($animal['ani_name']) ?></td>
                        <td><?= ucfirst($animal['spe_name']) ?></td>
                        <td><?= ucfirst($animal['bre_name']) ?></td>
                        <td><?= $animal['ani_reserved'] == 0 ? 'Non' : 'Oui' ?></td>
                        <td class="text-center">
                            <a href="#" class="btn btn-sm btn-outline-secondary me-1">+ d'Infos</a>
                            <a href="#" class="btn btn-sm my-btn-update me-1">Modifier</a>
                            <a href="#" class="btn btn-sm my-btn-delete me-1">Archiver</a>
                        </td>
                    </tr>
                <?php  } ?>
            </tbody>
        </table>

        <a href="../controllers/controller-admin.php" class="btn btn-outline-secondary">Retour Menu</a>
    </div>
</div>

<?php include_once 'template/footer.php'; ?>