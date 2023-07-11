<?php include_once 'template/head-admin.php'; ?>

<h1 class="text-center mt-4 mb-2 font-pangolin">Administration du refuge</h1>

<p class="text-center font-pangolin">Liste des pensionnaires</p>

<div class="row justify-content-center mx-0 mb-5">
    <div class="container col-7 p-3 rounded shadow bg-light">
        <table class="table rounded text-start">
            <thead>
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
                <tr class="align-middle">
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td class="text-center">
                        <a href="#" class="btn btn-sm btn-outline-secondary me-1">+ d'Infos</a>
                        <a href="#" class="btn btn-sm my-btn-update me-1">Modifier</a>
                        <a href="#" class="btn btn-sm my-btn-delete me-1">Archiver</a>
                    </td>
                </tr>
                <tr class="align-middle">
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td class="text-center">
                        <a href="#" class="btn btn-sm btn-outline-secondary me-1">+ d'Infos</a>
                        <a href="#" class="btn btn-sm my-btn-update me-1">Modifier</a>
                        <a href="#" class="btn btn-sm my-btn-delete me-1">Archiver</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php include_once 'template/footer.php'; ?>