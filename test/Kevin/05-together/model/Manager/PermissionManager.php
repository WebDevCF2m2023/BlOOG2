<?php

namespace model\Manager;

use PDO;
use Exception;

use model\Interface\InterfaceManager;
use model\Abstract\AbstractMapping;
use model\Mapping\PermissionMapping;

class PermissionManager implements InterfaceManager{

    protected ?PDO $db = null;

    public function __construct(PDO $pdo){
        $this->db = $pdo;
    }
    public function selectAll(): ?array{
        $query = $this->db->query("SELECT * FROM `permission`
        -- WHERE `permission_id` = 999
        ");
        if($query->rowCount() === 0) 
            return null;
        
        $permissions = $query->fetchAll(PDO::FETCH_ASSOC);
        $query->closeCursor();
        
        return array_map(fn($value) => new PermissionMapping($value), $permissions);
    }
    public function selectOneById(int $id){

    }
    // insérera uniquement des enfants de AbstractMapping
    public function insert(AbstractMapping $mapping){

    }
    public function update(AbstractMapping $mapping){

    }
    public function delete(int $id){

    }
}