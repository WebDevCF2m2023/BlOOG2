<?php

namespace model\Abstract;

abstract class AbstractMappingA
{
    protected ?int $id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        if ($id <= 0) {
            throw new Exception("ID non valide");
        }
        $this->id = $id;
    }

    abstract public function __toString(): string;
}
