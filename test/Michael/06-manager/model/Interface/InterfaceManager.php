<?php

namespace model\Interface;

use model\Abstract\AbstractMapping;
use PDO;

interface InterfaceManager
{
    public function __construct(PDO $pdo);
    public function selectAll();
    public function selectOneById(int $id);
    public function insert(AbstractMapping $mapping);
    public function update(AbstractMapping $mapping);
    public function delete(int $id);
}