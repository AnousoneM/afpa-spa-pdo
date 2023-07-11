<?php

class Animals
{

    // Nous déterminons les propriétés de la classe Animals selon les colonnes de la table animals de la base de données.
    private int $ani_id;
    private string $ani_name;
    private string $ani_sex;
    private string $ani_birthdate;
    private string $ani_adoptiondate;
    private string $ani_arrivaldate;
    private bool $ani_microchipped;
    private bool $ani_tattooed;
    private bool $ani_vaccinated;
    private bool $ani_reserved;
    private string $ani_description;
    private string $ani_picture;
    private int $ani_weight;

    private int $spe_id;
    private int $col_id;
    private int $bre_id;

    /**
     * Ajouter un animal dans la base de données
     * @param array $inputs Tableau contenant les données du formulaire
     * @return bool Retourne true si l'animal a bien été ajouté, false sinon
     */
    public function addAnimal(array $inputs)
    {
        try {
            // Creation d'une instance de connexion à la base de données
            $pdo = Database::createInstancePDO();

            // requête SQL pour ajouter un animal avec des marqueurs nominatifs
            $sql = 'INSERT INTO `animals` (`ani_name`, `ani_sex`, `ani_birthdate`, `ani_arrivaldate`, `ani_microchipped`, `ani_tattooed`, `ani_vaccinated`, `ani_description`, `ani_picture`, `ani_weight`,`col_id`, `spe_id`, `bre_id`) VALUES (:name, :sex, :birthdate, :arrivaldate, :microchipped, :tattooed, :vaccinated, :description, :picture, :weight, :color, :specie, :breed)';

            // On prépare la requête avant de l'exécuter
            $stmt = $pdo->prepare($sql);

            // On injecte les valeurs dans la requête
            $stmt->bindValue(':name', Database::safeData($inputs['name']), PDO::PARAM_STR);
            $stmt->bindValue(':sex', Database::safeData($inputs['sex']), PDO::PARAM_STR);
            $stmt->bindValue(':birthdate', $inputs['birthdate'], PDO::PARAM_STR);
            $stmt->bindValue(':arrivaldate', date("Y-m-d"), PDO::PARAM_STR);
            $stmt->bindValue(':microchipped', $inputs['microchipped'], PDO::PARAM_BOOL);
            $stmt->bindValue(':tattooed', $inputs['tattooed'], PDO::PARAM_BOOL);
            $stmt->bindValue(':vaccinated', $inputs['vaccinated'], PDO::PARAM_BOOL);
            $stmt->bindValue(':description', Database::safeData($inputs['description']), PDO::PARAM_STR);
            $stmt->bindValue(':picture', $inputs['specie'] == 1 ? 'dog.webp' : 'cat.webp', PDO::PARAM_STR);
            $stmt->bindValue(':weight', Database::safeData($inputs['weight']), PDO::PARAM_STR);
            $stmt->bindValue(':color', Database::safeData($inputs['color']), PDO::PARAM_BOOL);
            $stmt->bindValue(':specie', Database::safeData($inputs['specie']), PDO::PARAM_BOOL);
            $stmt->bindValue(':breed', Database::safeData($inputs['breed']), PDO::PARAM_BOOL);

            // On exécute la requête
            $stmt->execute();

            // On retourne true si l'animal a bien été ajouté
            return true;
        } catch (PDOException $e) {
            // test unitaire pour vérifier que l'animal n'a pas été ajouté et connaitre la raison
            echo 'Erreur : ' . $e->getMessage();
            return false;
        }
    }
}
