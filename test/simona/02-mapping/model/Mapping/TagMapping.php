<?php

namespace model\Mapping;
use model\Abstract\AbstractMappingA;
use Exception;

class TagMapping extends AbstractMappingA
{
    protected ?string $tag_slug;

    public function getTagSlug(): ?string
    {
        return html_entity_decode($this->tag_slug);
    }

    public function setTagSlug(?string $tag_slug): void
    {
        $text = htmlspecialchars(trim(strip_tags($tag_slug)), ENT_QUOTES);
        $this->tag_slug = $text;
    }

    public function __toString(): string
    {
        return "Cette instance est créée par " . self::class;
    }
}
