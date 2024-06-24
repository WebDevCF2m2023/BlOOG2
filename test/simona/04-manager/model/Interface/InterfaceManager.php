<?php

namespace model\Interface;

use PDO;

interface InterfaceManager
{
    public function __construct(PDO $pdo);
    public function selectAll();
    public function selectOneById(int $id);
    public function insert(object $object);
    public function update(object $object);
    public function delete(int $id);
}