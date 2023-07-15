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
     * @return bool Retourne true si l'animal a bien été ajouté, false si KO
     */
    public function addAnimal(array $inputs): bool
    {
        try {
            // Creation d'une instance de connexion à la base de données
            $pdo = Database::createInstancePDO();

            // requête SQL pour ajouter un animal avec des marqueurs nominatifs
            $sql = 'INSERT INTO `animals` (`ani_name`, `ani_sex`, `ani_birthdate`, `ani_arrivaldate`, `ani_microchipped`, `ani_tattooed`, `ani_vaccinated`, `ani_description`, `ani_picture`, `ani_weight`,`col_id`, `spe_id`, `bre_id`) VALUES (:name, :sex, :birthdate, :arrivaldate, :microchipped, :tattooed, :vaccinated, :description, :picture, :weight, :color, :specie, :breed)';

            // On prépare la requête avant de l'exécuter
            $stmt = $pdo->prepare($sql);

            // On injecte les valeurs dans la requête et nous utilisont la méthode bindValue pour se prémunir des injections SQL
            $stmt->bindValue(':name', Form::safeData($inputs['name']), PDO::PARAM_STR);
            $stmt->bindValue(':sex', Form::safeData($inputs['sex']), PDO::PARAM_STR);
            $stmt->bindValue(':birthdate', Form::safeData($inputs['birthdate']), PDO::PARAM_STR);
            $stmt->bindValue(':arrivaldate', Form::safeData($inputs['arrivaldate']), PDO::PARAM_STR);
            $stmt->bindValue(':microchipped', isset($inputs['microchipped']) ? Form::safeData($inputs['microchipped']) : 0, PDO::PARAM_BOOL);
            $stmt->bindValue(':tattooed', isset($inputs['tattooed']) ? Form::safeData($inputs['tattooed']) : 0, PDO::PARAM_BOOL);
            $stmt->bindValue(':vaccinated', isset($inputs['vaccinated']) ? Form::safeData($inputs['vaccinated']) : 0, PDO::PARAM_BOOL);
            $stmt->bindValue(':description', Form::safeData($inputs['description']), PDO::PARAM_STR);
            $stmt->bindValue(':picture', $inputs['specie'] == 1 ? 'dog.webp' : 'cat.webp', PDO::PARAM_STR);
            $stmt->bindValue(':weight', Form::safeData($inputs['weight']), PDO::PARAM_STR);
            $stmt->bindValue(':color', Form::safeData($inputs['color']), PDO::PARAM_INT);
            $stmt->bindValue(':specie', Form::safeData($inputs['specie']), PDO::PARAM_INT);
            $stmt->bindValue(':breed', Form::safeData($inputs['breed']), PDO::PARAM_INT);

            // On exécute la requête, elle sera true si elle a réussi, dans le cas contraire il y aura une exception
            // return $stmt->execute();
            return false;
        } catch (PDOException $e) {
            // test unitaire pour vérifier que l'animal n'a pas été ajouté et connaitre la raison
            // echo 'Erreur : ' . $e->getMessage();
            return false;
        }
    }

    /**
     * Méthode permettant d'obtenir tous les animaux
     * @return array Tableau associatif contenant les infos des animaux
     */
    public static function getAllAnimals(): array
    {

        try {
            // création d'une instance PDO
            $pdo = Database::createInstancePDO();

            // je stock ma requête dans une variable
            $sql = 'SELECT `ani_id`, `ani_sex`, `ani_reserved`, `ani_name`, DATE_FORMAT(`ani_birthdate`, "%d/%m/%Y") AS "birthdate", DATE_FORMAT(`ani_arrivaldate`, "%d/%m/%Y") AS `arrivaldate`, `ani_description`, `ani_picture`, `ani_weight`, `col_name`, `bre_name`, `spe_name` FROM `animals`
            NATURAL JOIN `colors`
            NATURAL JOIN `breeds`
            NATURAL JOIN `species`
            ORDER BY arrivaldate DESC';

            // J'effectue la requete et je la stock dans une variable (statement)
            $stmt = $pdo->query($sql);

            // Pour récupérer les données, j'utilise la méthode fetchAll()
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            // test unitaire pour vérifier que la liste n'a pas été recupérée et connaitre la raison
            // echo 'Erreur : ' . $e->getMessage();
            return false;
        }
    }
}
