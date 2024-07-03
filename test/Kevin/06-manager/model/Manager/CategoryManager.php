<?php

namespace model\Manager;

use Exception;
use model\Abstract\AbstractMapping;
use model\Interface\InterfaceManager;
use model\Mapping\CategoryMapping;
use PDO;

class CategoryManager implements InterfaceManager{

    // On va stocker la connexion dans une propriété privée
    private ?PDO $connect = null;

    // on va passer notre connexion PDO
    // à notre manager lors de son instanciation
    public function __construct(PDO $db){
        $this->connect = $db;
    }

    public function selectAllNamesID(): ?array
    {
        // requête SQL
        $sql = "SELECT `category_id`, `category_name` FROM `category`";
        // query car pas d'entrées d'utilisateur
        $select = $this->connect->query($sql);

        // si on ne récupère rien, on quitte avec un message d'erreur
        if($select->rowCount()===0) return null;

        // on transforme nos résultats en tableau associatif
        $array = $select->fetchAll(PDO::FETCH_ASSOC);

        // on ferme le curseur
        $select->closeCursor();

        // on va stocker les catégories dans un tableau
        $arrayCategory = [];

        /* pour chaque valeur, on va créer une instance de classe
        CategoryMapping, liée à la table qu'on va manager
        */
        foreach($array as $value){
            // on remplit un nouveau tableau contenant les catégories
            $arrayCategory[] = new CategoryMapping($value);
        }

        // on retourne le tableau
        return $arrayCategory;
    }

    // sélection de tous les articles
    public function selectAll(): ?array
    {
        // requête SQL
        $sql = "SELECT * FROM `category`";
        // query car pas d'entrées d'utilisateur
        $select = $this->connect->query($sql);

        // si on ne récupère rien, on quitte avec un message d'erreur
        if($select->rowCount()===0) return null;

        // on transforme nos résultats en tableau associatif
        $array = $select->fetchAll(PDO::FETCH_ASSOC);

        // on ferme le curseur
        $select->closeCursor();

        // on va stocker les catégories dans un tableau
        $arrayCategory = [];

        /* pour chaque valeur, on va créer une instance de classe
        CategoryMapping, liée à la table qu'on va manager
        */
        foreach($array as $value){
            // on remplit un nouveau tableau contenant les catégories
            $arrayCategory[] = new CategoryMapping($value);
        }

        // on retourne le tableau
        return $arrayCategory;
    }

    // récupération d'une catégorie via son id
    public function selectOneById(int $id): null|string|CategoryMapping
    {

        // requête préparée
        $sql = "SELECT * FROM `category` WHERE `category_id`= ?";
        $prepare = $this->connect->prepare($sql);

        try{
            $prepare->bindValue(1,$id, PDO::PARAM_INT);
            $prepare->execute();

            // pas de résultat = null
            if($prepare->rowCount()===0) return null;

            // récupération des valeurs en tableau associatif
            $result = $prepare->fetch(PDO::FETCH_ASSOC);

            // création de l'instance CategoryMapping
            $result = new CategoryMapping($result);

            $prepare->closeCursor();
            
            return $result;


        }catch(Exception $e){
            return $e->getMessage();
        }
        
    }

    // mise à jour d'une catégorie
    public function update(AbstractMapping $mapping): bool|string
    {

        if (!($mapping instanceof CategoryMapping)) {                    
            throw new Exception('L\'objet doit être une instance de CategoryMapping'); 
        }
        // requête préparée
        $sql = "UPDATE `category` SET `category_name`=?, `category_slug`=?, `category_description`=?, `category_parent`=? WHERE `category_id`=?";
        $prepare = $this->connect->prepare($sql);

        try{
            $prepare->bindValue(1,$mapping->getCategoryName());
            $prepare->bindValue(2,$mapping->getCategorySlug());
            $prepare->bindValue(3,$mapping->getCategoryDescription());
            $prepare->bindValue(4,$mapping->getCategoryParent());
            $prepare->bindValue(5,$mapping->getCategoryId(), PDO::PARAM_INT);

            $prepare->execute();

            $prepare->closeCursor();

            return true;

        }catch(Exception $e){
            return $e->getMessage();
        }
        
    }


    // insertion d'une catégorie
    public function insert(AbstractMapping $mapping): bool|string
    {
        if (!($mapping instanceof CategoryMapping)) {                    
            throw new Exception('L\'objet doit être une instance de CategoryMapping'); 
        }

        // requête préparée
        $sql = "INSERT INTO `category`(`category_name`, `category_slug`, `category_description`, `category_parent` )  VALUES (?,?,?,?)";
        $prepare = $this->connect->prepare($sql);

        try{
            $prepare->bindValue(1,$mapping->getCategoryName());
            $prepare->bindValue(2,$mapping->getCategorySlug());
            $prepare->bindValue(3,$mapping->getCategoryDescription());
            $prepare->bindValue(4,$mapping->getCategoryParent());

            $prepare->execute();

            $prepare->closeCursor();

            return true;

        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    // suppression d'une catégorie
    public function delete(int $id): bool|string
    {
        // requête préparée
        $sql = "DELETE FROM `category` WHERE `category_id`=?";
        $prepare = $this->connect->prepare($sql);

        try{
            $prepare->bindValue(1,$id, PDO::PARAM_INT);

            $prepare->execute();

            $prepare->closeCursor();

            return true;

        }catch(Exception $e){
            return $e->getMessage();
        }
        
    }

}