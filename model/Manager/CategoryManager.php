<?php

namespace model\Manager;

use model\Abstract\AbstractMapping;
use model\Interface\InterfaceManager;
use model\Interface\InterfaceSlugManager;
use model\Mapping\CategoryMapping;
use PDO;
use Exception;


class CategoryManager implements  InterfaceManager, InterfaceSlugManager
{

    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }



    public function selectAll()
    {
        $sql = "SELECT * FROM category";
        $query = $this->pdo->query($sql);
        return $query->fetchAll();
    }

    public function selectAllForMenu()
    {
        $sql = "SELECT c.category_id, c.category_name, c.category_slug, c.category_parent FROM category c ";
        $query = $this->pdo->query($sql);
        return $query->fetchAll();
    }



    public function selectOneById(int $id)
    {
        // TODO: Implement selectOneById() method.
    }

    public function insert(AbstractMapping $mapping)
    {
        // TODO: Implement insert() method.
    }

    public function update(AbstractMapping $mapping)
    {
        // TODO: Implement update() method.
    }

    public function delete(int $id)
    {
        // TODO: Implement delete() method.
    }

    public function selectOneBySlug(string $slug): object
    {
        // TODO: Implement selectOneBySlug() method.
    }
}