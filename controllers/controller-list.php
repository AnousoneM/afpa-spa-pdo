<?php

// j'ouvre ma session
session_start();

// je vérifie que l'utilisateur est bien connecté
if(!isset($_SESSION['user'])){
    header('Location: ../index.php');
    exit;
}

require_once '../config.php';

require_once '../helpers/Database.php';

require_once '../models/Animals.php';

?>

<!-- Ici pour la logique de la page -->

<?php include_once '../views/view-list.php'; ?>