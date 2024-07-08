<?php

namespace model\Interface;

use PDO;

use model\Abstract\AbstractMapping;

interface InterfaceManager
{
    public function __construct(PDO $pdo);
    public function selectAll();
    public function selectOneById(int $id);
    // insérera uniquement des enfants de AbstractMapping
    public function insert(AbstractMapping $mapping);
    public function update(AbstractMapping $mapping);
    public function delete(int $id);
}