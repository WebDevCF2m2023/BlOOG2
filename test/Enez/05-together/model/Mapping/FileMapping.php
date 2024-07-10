<?php

namespace model\Mapping;

use model\Abstract\AbstractMapping;
use Exception;

class FileMapping extends AbstractMapping
{
    protected ?int $file_id = null;
    protected ?string $file_url = null;
    protected ?string $file_description = null;
    protected ?string $file_type = null;

    // Constants for error messages
    private const INVALID_ID_MESSAGE = "ID non valide";
    private const INVALID_URL_MESSAGE = "URL non valide";

    public function getFileId(): ?int
    {
        return $this->file_id;
    }

    public function setFileId(?int $file_id): void
    {
        if ($file_id === null || $file_id <= 0) {
            throw new Exception(self::INVALID_ID_MESSAGE);
        }
        $this->file_id = $file_id;
    }

    public function getFileUrl(): ?string
    {
        return html_entity_decode($this->file_url);
    }

    public function setFileUrl(?string $file_url): void
    {
        $cleanedUrl = trim(strip_tags($file_url));
        if (!filter_var($cleanedUrl, FILTER_VALIDATE_URL)) {
            throw new Exception(self::INVALID_URL_MESSAGE);
        }
        $this->file_url = $cleanedUrl;
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
        return "Cette instance est créée par " . self::class;
    }
}

?>