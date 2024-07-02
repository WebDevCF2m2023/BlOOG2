<?php

namespace model\Mapping;

use model\Abstract\AbstractMapping;
use model\Trait\TraitDateTime;
use model\Trait\TraitSlugify;
use DateTime;
use Exception;

class ArticleMapping extends AbstractMapping
{
    protected ?int $article_id=null;
    protected ?string $article_title=null;
    protected ?string $article_slug=null;
    protected ?string $article_text=null;
    protected null|string|DateTime $article_date_create=null;
    protected null|string|DateTime $article_date_update=null;
    protected null|string|DateTime $article_date_publish=null;
    protected ?bool $article_is_published = false;
    protected ?int $user_user_id=null;

    use TraitDateTime;
    use TraitSlugify;

    public function getArticleDateCreate(): null|string|DateTime
    {
        return $this->article_date_create;
    }

    public function setArticleDateCreate(null|string|DateTime $article_date_create): void
    {
        $this->formatDateTime($article_date_create, "article_date_create");
    }

    public function getArticleDateUpdate(): null|string|DateTime
    {
        return $this->article_date_update;
    }

    public function setArticleDateUpdate(null|string|DateTime $article_date_update): void
    {
        $this->formatDateTime($article_date_update, "article_date_update");
    }

    public function getArticleDatePublish(): null|string|DateTime
    {
        return $this->article_date_publish;
    }

    public function setArticleDatePublish(null|string|DateTime $article_date_publish): void
    {
        $this->formatDateTime($article_date_publish, "article_date_publish");
    }

    public function getUserUserId(): ?int
    {
        return $this->user_user_id;
    }

    public function setUserUserId(?int $user_user_id): void
    {
        $this->user_user_id = $user_user_id;
    }

    public function getArticleIsPublished(): ?bool
    {
        return $this->article_is_published;
    }

    public function setArticleIsPublished(?bool $article_is_published): void
    {
        $this->article_is_published = $article_is_published;
    }

    public function getArticleTitle(): ?string
    {
        return $this->article_title;
    }

    public function setArticleTitle(?string $article_title): void
    {
        $article_title = trim(strip_tags($article_title));
        $this->article_title = $article_title;
    }

    public function getArticleSlug(): ?string
    {
        return $this->article_slug;
    }

    public function setArticleSlug(?string $article_slug): void
    {
        $this->article_slug = $this->slugify($article_slug === null ? $this->getArticleTitle() : $article_slug);
    }

    public function getArticleId(): ?int
    {
        return $this->article_id;
    }

    public function setArticleId(?int $article_id): void
    {
        if($article_id<=0 && $article_id !== null) throw new Exception("ID non valide"); 
        $this->article_id = $article_id;
    }

    public function getArticleText(): ?string
    {
        return $this->article_text;
    }

    public function setArticleText(?string $article_text): void
    {
        $this->article_text = $article_text;
    }

    public function __toString(): string
    {
        return "article_title";
    }


}