<?php

namespace model\Mapping;

use model\Abstract\AbstractMapping;

class MappingTag extends AbstractMapping{

    protected ?int $tag_id;
    protected ?string $tag_slug;

    public function setTagId(int $id): void
    {
        $this->tag_id = $id;
    }

    public function setTagSlug(string $slug): void
    {
        $this->tag_slug = $slug;
    }

}