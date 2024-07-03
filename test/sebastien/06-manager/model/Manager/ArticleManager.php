<?php

namespace model\Manager ;

use Exception;
use model\Abstract\AbstractMapping;
use model\Interface\InterfaceManager;
use model\Mapping\ArticleMapping;
use PDO;

class ArticleManager implements InterfaceManager{

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
        $sql = "SELECT * FROM `article` -- WHERE `comment_id`=999
         ORDER BY `article_date_create` DESC";
        // query car pas d'entrées d'utilisateur
        $select = $this->connect->query($sql);

        // si on ne récupère rien, on quitte avec un message d'erreur
        if($select->rowCount()===0) return null;

        // on transforme nos résultats en tableau associatif
        $array = $select->fetchAll(PDO::FETCH_ASSOC);

        // on ferme le curseur
        $select->closeCursor();

        // on va stocker les commentaires dans un tableau
        $arrayArticle = [];

        /* pour chaque valeur, on va créer une instance de classe
        CommentMapping, liée à la table qu'on va manager
        */
        foreach($array as $value){
            // on remplit un nouveau tableau contenant les commentaires
            $arrayArticle[] = new ArticleMapping($value);
        }

        // on retourne le tableau
        return $arrayArticle;
    }

    // récupération d'un commentaire via son id
    public function selectOneById(int $id): null|string|ArticleMapping
    {

        // requête préparée
        $sql = "SELECT * FROM `article` WHERE `article_id`= ?";
        $prepare = $this->connect->prepare($sql);

        try{
            $prepare->bindValue(1,$id, PDO::PARAM_INT);
            $prepare->execute();

            // pas de résultat = null
            if($prepare->rowCount()===0) return null;

            // récupération des valeurs en tableau associatif
            $result = $prepare->fetch(PDO::FETCH_ASSOC);

            // création de l'instance CommentMapping
            $result = new ArticleMapping($result);

            $prepare->closeCursor();
            
            return $result;


        }catch(Exception $e){
            return $e->getMessage();
        }
        
    }

    // mise à jour d'un commentaire
    public function update(AbstractMapping $mapping): bool|string
    {

        if (!($mapping instanceof ArticleMapping)) {                    
            throw new Exception('L\'objet doit être une instance de CommentMapping'); 
        }
        // requête préparée
        $sql = "UPDATE `article` SET `article_text`=?, `article_date_update`=? WHERE `article_id`=?";
        // mise à jour de la date de modification
        $mapping->setArticleDateUpdate(date("Y-m-d H:i:s"));
        $prepare = $this->connect->prepare($sql);

        try{
            $prepare->bindValue(1,$mapping->getArticleText());
            $prepare->bindValue(2,$mapping->getArticleDateUpdate());
            $prepare->bindValue(3,$mapping->getArticleId(), PDO::PARAM_INT);

            $prepare->execute();

            $prepare->closeCursor();

            return true;

        }catch(Exception $e){
            return $e->getMessage();
        }
        
    }


    // insertion d'un commentaire - À modifier !
    public function insert(AbstractMapping $mapping): bool|string
    {
        if (!($mapping instanceof ArticleMapping)) {                    
            throw new Exception('L\'objet doit être une instance de CommentMapping'); 
        }

        // requête préparée
        $sql = "INSERT INTO `article`(`article_title`,`article_text`,`article_slug`,`user_user_id`)  VALUES (?,?,?,?)";
        $prepare = $this->connect->prepare($sql);

        try{
            $prepare->bindValue(1,$mapping->getArticleTitle());
            $prepare->bindValue(2,$mapping->getArticleText());
            $prepare->bindValue(3,$mapping->getArticleSlug());
            $prepare->bindValue(4,$mapping->getUserUserId());
          
            $prepare->execute();

            $prepare->closeCursor();

            return true;

        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    // suppression d'un commentaire
    public function delete(int $id): bool|string
    {
        // requête préparée
        $sql = "DELETE FROM `article` WHERE `article_id`=?";
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