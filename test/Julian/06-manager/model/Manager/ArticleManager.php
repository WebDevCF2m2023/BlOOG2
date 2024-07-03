<?php

namespace model\Manager ;

use Exception;
use model\Abstract\AbstractMapping;
use model\Interface\InterfaceManager;
use model\Mapping\ArticleMapping;
use PDO;

class ArticleManager implements InterfaceManager{

    private ?PDO $connect = null;

    public function __construct(PDO $db) {
        $this->connect = $db;
    }

    public function selectAll(): ?array
    {
        $sql = "SELECT * FROM `article` ORDER BY `article_date_create` DESC";
        $select = $this->connect->query($sql);

        if($select->rowCount()===0) return null;

        $array = $select->fetchAll(PDO::FETCH_ASSOC);

        $select->closeCursor();

        $arrayArticle = [];

        foreach($array as $value){
            $arrayArticle[] = new ArticleMapping($value);
        }

        return $arrayArticle;
    }

    public function selectOneById(int $id): null|string|ArticleMapping
    {
        $sql = "SELECT * FROM `article` WHERE `article_id`=?";
        $prepare = $this->connect->prepare($sql);
        $prepare->bindValue(1, $id, PDO::PARAM_INT);
        $prepare->execute();

        if($prepare->rowCount()===0) return null;

        $array = $prepare->fetch(PDO::FETCH_ASSOC);

        $prepare->closeCursor();

        return new ArticleMapping($array);
    }
    
    public function insert(AbstractMapping $mapping): bool|string
    {
        if($mapping instanceof ArticleMapping){
            // Generate a slug if it's not set
            $slug = $mapping->getArticleSlug() ?? $this->slugify($mapping->getArticleTitle());
            $uniqueSlug = $this->generateUniqueSlug($slug);
            $mapping->setArticleSlug($uniqueSlug);
            
            $sql = "INSERT INTO `article`(`article_title`, `article_text`, `article_slug`, `article_date_create`, `article_date_update`, `user_user_id`) VALUES (:title, :content, :slug, :date_create, :date_update, :user_id)";
            $prepare = $this->connect->prepare($sql);
            $prepare->bindValue(':title', $mapping->getArticleTitle(), PDO::PARAM_STR);
            $prepare->bindValue(':content', $mapping->getArticleText(), PDO::PARAM_STR);
            $prepare->bindValue(':slug', $mapping->getArticleSlug(), PDO::PARAM_STR);
            $prepare->bindValue(':date_create', $mapping->getArticleDateCreate(), PDO::PARAM_STR);
            $prepare->bindValue(':date_update', $mapping->getArticleDateUpdate(), PDO::PARAM_STR);
            $prepare->bindValue(':user_id', $mapping->getUserUserId(), PDO::PARAM_INT);
            $prepare->execute();
            $prepare->closeCursor();
            return true;
        }else{
            return "Erreur de type";
        }
    }

    private function slugify($string) {
        $string = preg_replace('/[^a-z0-9]+/i', '-', $string);
        $string = strtolower(trim($string, '-'));
        return $string;
    }
    
    public function update(AbstractMapping $mapping): bool|string
    {
        if($mapping instanceof ArticleMapping){
            $currentArticle = $this->selectOneById($mapping->getArticleId());
            $newSlug = $mapping->getArticleSlug();
            
            if ($currentArticle->getArticleSlug() !== $newSlug) {
                $uniqueSlug = $this->generateUniqueSlug($newSlug, $mapping->getArticleId());
                $mapping->setArticleSlug($uniqueSlug);
            }
            
            $sql = "UPDATE `article` SET `article_title`=:title, `article_text`=:content, `article_slug`=:slug, `article_date_update`=:date_update WHERE `article_id`=:id";
            $prepare = $this->connect->prepare($sql);
            $prepare->bindValue(':title', $mapping->getArticleTitle(), PDO::PARAM_STR);
            $prepare->bindValue(':content', $mapping->getArticleText(), PDO::PARAM_STR);
            $prepare->bindValue(':slug', $mapping->getArticleSlug(), PDO::PARAM_STR);
            $prepare->bindValue(':date_update', $mapping->getArticleDateUpdate(), PDO::PARAM_STR);
            $prepare->bindValue(':id', $mapping->getArticleId(), PDO::PARAM_INT);
            $prepare->execute();
            $prepare->closeCursor();
            return true;
        }else{
            return "Erreur de type";
        }
    }

    public function delete(int $id): bool|string
    {
        $sql = "DELETE FROM `article` WHERE `article_id`=:id";
        $prepare = $this->connect->prepare($sql);
        $prepare->bindValue(':id', $id, PDO::PARAM_INT);
        $prepare->execute();
        $prepare->closeCursor();
        return true;
    }


    public function generateUniqueSlug(string $slug, ?int $articleId = null): string
    {
        $originalSlug = $slug;
        $counter = 1;
        
        while ($this->slugExists($slug, $articleId)) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }
        
        return $slug;
    }
    
    private function slugExists(string $slug, ?int $articleId = null): bool
    {
        $sql = "SELECT COUNT(*) FROM `article` WHERE `article_slug` = :slug";
        $params = [':slug' => $slug];
    
        if ($articleId !== null) {
            $sql .= " AND `article_id` != :id";
            $params[':id'] = $articleId;
        }
    
        $prepare = $this->connect->prepare($sql);
        $prepare->execute($params);
        
        return (bool) $prepare->fetchColumn();
    }

}

