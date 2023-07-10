<?php

class Database
{
    /**
     * Permet de créer une instance de PDO
     * @return object|string Instance PDO ou Message d'erreur
     */
    public static function createInstancePDO(): object | string
    {
        try {
            $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
            // A Activer seulement en developpement
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
        }
    }
}
