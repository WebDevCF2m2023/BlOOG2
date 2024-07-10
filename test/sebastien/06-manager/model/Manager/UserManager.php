<?php

namespace model\Manager ;

use Exception;
use model\Abstract\AbstractMapping;
use model\Interface\InterfaceManager;
use model\Mapping\UserMapping;
use PDO;

class UserManager implements InterfaceManager{

    // On va stocker la connexion dans une propriété privée
    private ?PDO $connect = null;

    // on va passer notre connexion PDO
    // à notre manager lors de son instanciation
    public function __construct(PDO $db){
        $this->connect = $db;
    }

    // sélection de tous les articles
    public function selectAll(): ?array
    {
        // requête SQL
        $sql = "SELECT * FROM `user` 
         ORDER BY `user_id` DESC";
        // query car pas d'entrées d'utilisateur
        $select = $this->connect->query($sql);

        // si on ne récupère rien, on quitte avec un message d'erreur
        if($select->rowCount()===0) return null;

        // on transforme nos résultats en tableau associatif
        $array = $select->fetchAll(PDO::FETCH_ASSOC);

        // on ferme le curseur
        $select->closeCursor();

        // on va stocker les users dans un tableau
        $arrayUser = [];

        /* pour chaque valeur, on va créer une instance de classe
        CommentMapping, liée à la table qu'on va manager
        */
        foreach($array as $value){
            // on remplit un nouveau tableau contenant les users
            $arrayComment[] = new UserMapping($value);
        }

        // on retourne le tableau
        return $arrayComment;
    }

    // récupération d'un user via son id
    public function selectOneById(int $id): null|string|UserMapping
    {

        // requête préparée
        $sql = "SELECT * FROM `user` WHERE `user_id`= ?";
        $prepare = $this->connect->prepare($sql);

        try{
            $prepare->bindValue(1,$id, PDO::PARAM_INT);
            $prepare->execute();

            // pas de résultat = null
            if($prepare->rowCount()===0) return null;

            // récupération des valeurs en tableau associatif
            $result = $prepare->fetch(PDO::FETCH_ASSOC);

            // création de l'instance UserMapping
            $result = new UserMapping($result);

            $prepare->closeCursor();
            
            return $result;


        }catch(Exception $e){
            return $e->getMessage();
        }
        
    }

    // mise à jour d'un user
    public function update(AbstractMapping $mapping): bool|string
    {

        if (!($mapping instanceof UserMapping)) {                    
            throw new Exception('L\'objet doit être une instance de UserMapping'); 
        }
        // requête préparée
        $sql = "UPDATE `user` SET `user_full_name`=?, `user_mail`=? WHERE `user_id`=?";
        $prepare = $this->connect->prepare($sql);

        try{
            $prepare->bindValue(1,$mapping->getUserFullName());
            $prepare->bindValue(2,$mapping->getUserMail());
            $prepare->bindValue(3,$mapping->getUserId(), PDO::PARAM_INT);

            $prepare->execute();

            $prepare->closeCursor();

            return true;

        }catch(Exception $e){
            return $e->getMessage();
        }
        
    }


   // insertion d'un user
public function insert(AbstractMapping $mapping): bool|string
{
    if (!($mapping instanceof UserMapping)) {                    
        throw new Exception('L\'objet doit être une instance de UserMapping'); 
    }

    // requête préparée avec des placeholders
    $sql = "INSERT INTO `user` (`user_full_name`, `user_mail`,`permission_permission_id`) VALUES (?, ?,4)";
    $prepare = $this->connect->prepare($sql);

    try {
        // Liaison des valeurs aux placeholders
        $prepare->bindValue(1, $mapping->getUserFullName());
        $prepare->bindValue(2, $mapping->getUserMail());

        $prepare->execute();

        $prepare->closeCursor();

        return true;

    } catch (Exception $e) {
        return $e->getMessage();
    }
}


    // suppression d'un user
    public function delete(int $id): bool|string
    {
        // requête préparée
        $sql = "DELETE FROM `user` WHERE `user_id`=?";
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