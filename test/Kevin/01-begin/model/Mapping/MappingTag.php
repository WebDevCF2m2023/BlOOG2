<?php

namespace model\Mapping;

use model\Abstract\AbstractMapping;

class MappingTag extends AbstractMapping{

    protected ?int $tag_id;
    protected ?string $tag_slug;

    public function setTagId(int $id): void
    {
        if($id < 1) throw new \Exception("ID invalide car inférieur a 1.");
        $this->tag_id = $id;
    }

    use \model\Trait\TraitSlugify;

    public function setTagSlug(string $slug): void
    {
        $this->tag_slug = $this->slugify($slug);
    }

    public function __toString(): string
    {
        return 'Cette classe est une instance de ' . self::class;
    }
    


}