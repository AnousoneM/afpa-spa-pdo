<?php

require_once '../config.php';

require_once '../helpers/Database.php';
require_once '../helpers/Form.php';

require_once '../models/Animals.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = strip_tags($_GET['id']);
    $animal = new Animals();
    $animalDetails = $animal->getAnimalDetail($id);
} else {
    header('Location: ../index.php');
}

?>

<?php include_once '../views/view-details.php'; ?>