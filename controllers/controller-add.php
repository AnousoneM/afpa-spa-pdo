<?php

require_once '../config.php';

require_once '../helpers/Database.php';
require_once '../helpers/Form.php';

require_once '../models/Animals.php';
require_once '../models/Colors.php';
require_once '../models/Species.php';
require_once '../models/Breeds.php';

// Nous définissons un tableau d'erreurs
$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Contrôle du nom : vide et pattern
    if (isset($_POST['name'])) {

        if (empty($_POST['name'])) {
            $errors['name'] = 'Le nom est obligatoire';
        } else if (!preg_match(REGEX_NAME, $_POST['name'])) {
            $errors['name'] = 'Le nom n\'est pas valide';
        }
    }

    // controle du type : si selectionné et si existe dans la base de données
    if (!isset($_POST['specie'])) {
        $errors['specie'] = 'Veuillez sélectionner un type d\'animal';
    }

    // controle du sexe : si selectionné et si existe dans la base de données
    if (!isset($_POST['sex'])) {
        $errors['sex'] = 'Veuillez sélectionner le sexe de l\'animal';
    }

    // controle de la couleur : si selectionné et si existe dans la base de données
    if (!isset($_POST['color'])) {
        $errors['color'] = 'Veuillez sélectionner une type couleur';
    }

    // controle de la race : si selectionné et si existe dans la base de données
    if (!isset($_POST['breed'])) {
        $errors['breed'] = 'Veuillez sélectionner une race d\'animal';
    }

    // controle du poids : vide et pattern
    if (isset($_POST['weight'])) {
        if (empty($_POST['weight'])) {
            $errors['weight'] = 'Le poids est obligatoire';
        } else if (!preg_match(REGEX_WEIGHT, $_POST['weight'])) {
            $errors['weight'] = 'Le poids n\'est pas valide';
        }
    }

    // Contrôle de la description : vide et pattern
    if (isset($_POST['description'])) {

        if (!preg_match(REGEX_NAME, $_POST['description'])) {
            $errors['description'] = 'Le texte n\'est pas valide';
        }

        if (empty($_POST['description'])) {
            $errors['description'] = 'La description est obligatoire';
        }
    }

    // si le tableau d'erreurs est vide, on ajoute l'animal dans la base de données
    if (empty($errors)) {
        // instanctaion de la classe Animals
        $animal = new Animals();
        // utilisation de la méthode addAnimal pour ajouter un animal dans la base de données
        $animal->addAnimal($_POST);
    }
}

?>

<?php include_once '../views/view-add.php'; ?>
