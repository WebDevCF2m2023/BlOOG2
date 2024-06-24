<?php

namespace model\Mapping;

use model\Abstract\AbstractMapping;
use model\Trait\TraitDateTime;
use DateTime;
use Exception;

class CommentMapping extends AbstractMapping
{
    // Les propriétés de la classe sont le nom des
    // attributs de la table Exemple (qui serait en
    // base de données)
    protected ?int $comment_id=null;
    protected ?string $comment_text=null;
    protected ?int $comment_parent=null;
    protected null|string|DateTime $comment_date_create=null;
    protected null|string|DateTime $comment_date_update=null;
    protected null|string|DateTime $comment_date_publish=null;
    protected ?bool $comment_is_published = false;
    protected ?int $user_user_id=null;
    protected ?int $article_article_id=null;

    

    // On utilise le trait pour les dates
    use TraitDateTime;

    // Les getters et setters

    public function getCommentId(): ?int
    {
        return $this->comment_id;
    }

    public function setCommentId(?int $comment_id): void
    {
        if($comment_id<=0) throw new Exception("ID non valide"); 
        $this->comment_id = $comment_id;
    }

    public function getCommentText(): ?string
    {

        return $this->comment_text;
       
    }

    public function setCommentText(?string $comment_text): void
    {
        // cryptage
        $text = trim(strip_tags($comment_text));
        $this->comment_text = $text;
    }

    public function getCommentParent(): ?int
    {
        return $this->comment_parent;
    }

    public function setCommentParent(?int $comment_parent): void
    {
        $this->comment_parent = $comment_parent;
    }



    public function getCommentDateCreate(): null|string|DateTime
    {
        return $this->comment_date_create;
    }

    public function setCommentDateCreate(null|string|DateTime $comment_date_create): void
    {
        // on utilise le trait pour les dates
        $this->formatDateTime($comment_date_create, "comment_date_create");

    }


    public function getCommentDateUpdate(): null|string|DateTime
    {
        return $this->comment_date_update;
    }

    public function setCommentDateUpdate(null|string|DateTime $comment_date_update): void
    {
        // on utilise le trait pour les dates
        $this->formatDateTime($comment_date_update, "comment_date_update");

    }


    public function getCommentDatePublish(): null|string|DateTime
    {
        return $this->comment_date_publish;
    }

    public function setCommentDatePublish(null|string|DateTime $comment_date_publish): void
    {
        // on utilise le trait pour les dates
        $this->formatDateTime($comment_date_publish, "comment_date_publish");

    }


    public function getCommentIsPublished(): ?bool
    {
        return $this->comment_is_published;
    }

    public function setCommentIsPublished(?bool $comment_is_published): void
    {
        $this->comment_is_published = $comment_is_published;
    }


    public function getUserUserId(): ?int
    {
        return $this->user_user_id;
    }

    public function setUserUserId(?int $user_user_id): void
    {
        if($user_user_id<=0) throw new Exception("ID non valide"); 
        $this->user_user_id = $user_user_id;
    }



    public function getArticleArticleId(): ?int
    {
        return $this->article_article_id;
    }

    public function setArticleArticleId(?int $article_article_id): void
    {
        if($article_article_id<=0) throw new Exception("ID non valide"); 
        $this->article_article_id = $article_article_id;
    }


    // on doit implémenter la classe abstraite du parent
    // __toString est une méthode magique qui, si on veut
    // afficher l'instance comme une chaîne de caractère
    public function __toString(): string
    {
        return "Cette instance est créée par ".self::class;
    }

}