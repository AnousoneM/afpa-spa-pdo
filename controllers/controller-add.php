<?php

require_once '../config.php';
require_once '../helpers/Database.php';

require_once '../models/Animals.php';

require_once '../models/Colors.php';
require_once '../models/Species.php';
require_once '../models/Breeds.php';

// Nous définissons un tableau d'erreurs
$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Contrôle du nom
    if (isset($_POST['name'])) {

        if (empty($_POST['name'])) {
            $errors['name'] = 'Le nom est obligatoire';
        } else if (!preg_match(REGEX_NAME, $_POST['name'])) {
            $errors['name'] = 'Le nom n\'est pas valide';
        }
    }

    // controle du type
    if (!isset($_POST['specie'])) {
        $errors['specie'] = 'Veuillez sélectionner un type d\'animal';
    }

    if (!isset($_POST['sex'])) {
        $errors['sex'] = 'Veuillez sélectionner le sexe de l\'animal';
    }

    // controle de la couleur
    if (!isset($_POST['color'])) {
        $errors['color'] = 'Veuillez sélectionner une type couleur';
    }

    // controle de la race
    if (!isset($_POST['breed'])) {
        $errors['breed'] = 'Veuillez sélectionner une race d\'animal';
    }

    // controle du poids
    if (isset($_POST['weight'])) {
        if (empty($_POST['weight'])) {
            $errors['weight'] = 'Le poids est obligatoire';
        } else if (!preg_match(REGEX_WEIGHT, $_POST['weight'])) {
            $errors['weight'] = 'Le poids n\'est pas valide';
        }
    }


    // Contrôle de la description
    if (isset($_POST['description'])) {

        if (!preg_match(REGEX_NAME, $_POST['description'])) {
            $errors['description'] = 'Le texte n\'est pas valide';
        }

        if (empty($_POST['description'])) {
            $errors['description'] = 'La description est obligatoire';
        }
    }

    


}

?>

<?php include_once '../views/view-add.php'; ?>
