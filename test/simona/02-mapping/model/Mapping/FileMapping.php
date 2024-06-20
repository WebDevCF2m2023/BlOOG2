<?php

namespace model\Mapping;
use model\Abstract\AbstractMapping;
use Exception;

class FileMapping
{
   
    protected ?int $file_id;
    protected ?string $file_url;
    protected ?string $file_description;
    protected ?string $file_type;


    public function getFileId(): ?int
    {
        return $this->file_id;
    }

    public function setFileId(?int $file_id): void
    {
        if ($file_id <= 0) {
            throw new Exception("ID non valide");
        }
        $this->file_id = $file_id;
    }

    public function getFileUrl(): ?string
    {
        return html_entity_decode($this->file_url);
    }

    public function setFileUrl(?string $file_url): void
    {
        $text = htmlspecialchars(trim(strip_tags($file_url)), ENT_QUOTES);
        $this->file_url = $text;
    }

    public function getFileDescription(): ?string
    {
        return $this->file_description;
    }

    public function setFileDescription(?string $file_description): void
    {
        $this->file_description = $file_description;
    }

    public function getFileType(): ?string
    {
        return $this->file_type;
    }

    public function setFileType(?string $file_type): void
    {
        $this->file_type = $file_type;
    }
    public function __toString(): string
    {
        return "Cette instance est créée par ".self::class;
    }
}
