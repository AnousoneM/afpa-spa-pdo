<?php

class Users
{
    private int $use_id;
    private string $use_login;
    private string $use_mdp;

    /**
     * Permet de vérifier le login existe dans la base de données
     */
    public static function checkLogin($login)
    {
        $pdo = Database::createInstancePDO();
        $sql = "SELECT * FROM `users` WHERE `use_login` = :login"; // marqueur nominatif
        $stmt = $pdo->prepare($sql); // on prepare la requete
        $stmt->bindValue(':login', Form::safeData($login), PDO::PARAM_STR); // on associe le marqueur nominatif à la variable $login
        $stmt->execute(); // on execute la requete

        // A l'aide d'une ternaire, nous vérifions si nous avons un résultat à l'aide de la méthode rowCount()
        // Si le résultat est différent de 0, nous récupérons les données avec la méthode fetch(), sinon nous retournons false
        $stmt->rowCount() != 0 ? $result = true : $result = false;
        return $result;
    }

    /**
     * Permet de verifier le mdp selon un login
     */
    public static function checkPassword($login, $password)
    {
        $pdo = Database::createInstancePDO(); // Création d'une instance PDO
        $sql = "SELECT * FROM `users` WHERE `use_login` = :login"; // marqueur nominatif :login
        $stmt = $pdo->prepare($sql); // on prepare la requete
        $stmt->bindValue(':login', Form::safeData($login), PDO::PARAM_STR); // on associe le marqueur nominatif à la variable $login
        $stmt->execute(); // on execute la requete

        $result = $stmt->fetch(PDO::FETCH_ASSOC); // on recupère le resultat à l'aide d'un fetch

        if(password_verify($password, $result['use_password'])){
            return true; // si password OK
        } else {
            return false; // si paswword différent
        }
    }
}
