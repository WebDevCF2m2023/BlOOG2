<?php

namespace model\Mapping;

use model\Abstract\AbstractMapping;

class MappingTag extends AbstractMapping{
    protected ?int $tag_id;
    protected ?string $tag_slug; 

    //getters
    public function getTagId():?int{
        return $this->tag_id;
    }
    public function getTagSlug():?string{
        return $this->tag_slug;
    }

    //setters
    public function setTagId(int $tag_id):self{
        $this->tag_id = $tag_id;
        return $this;
    }
    public function setTagSlug(string $tag_slug):self{
        $this->tag_slug = $tag_slug;
        return $this;
    }
}