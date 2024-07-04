<?php

namespace model\Mapping;
use model\Abstract\AbstractMapping;
use model\Trait\TraitSlugify;
use Exception;

class TagMapping extends AbstractMapping
{
    
    protected ?int $tag_id=null;
    protected ?string $tag_slug=null;


    use TraitSlugify;
    public function getTagId(): ?int
    {
        return $this->tag_id;
    }

    public function setTagId(?int $tag_id): void
    {
        if ($tag_id <= 0) {
            throw new Exception("ID non valide");
        }
        $this->tag_id = $tag_id;
    }

    public function getTagSlug(): ?string
    {
        
        return $this->tag_slug;
    }

    public function setTagSlug(?string $tag_slug): void
    {

        $this->tag_slug = $this->slugify($tag_slug);
    }
    public function __toString(): string
    {
        return "Cette instance est créée par ".self::class;
    }
}
