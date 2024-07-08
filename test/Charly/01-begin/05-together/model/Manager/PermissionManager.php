<?php

# création ou utilisation de l'espace de nom
namespace model\Manager;

# Appel de l'interface
use model\Interface\InterfaceManager;

# Appel de l'abstract mapping
use model\Abstract\AbstractMapping;

# Racine
use PDO;
use Exception;
use model\Mapping\PermissionMapping;

class PermissionManager implements InterfaceManager{

    // propriété qui stock notre connexion à la DB
    protected ?PDO $db = null;

    public function __construct(PDO $pdo){
        $this->db = $pdo;
    }

    public function selectAll(): ?array
    {
        $query = $this->db->query("SELECT * FROM `permission`
        -- WHERE `permission_id`=999
        ");
        // si pas de résultats
        if($query->rowCount()===0) return null;

        // récupération des résultats au format tableau associatif
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        // on ferme le curseur
        $query->closeCursor();
        // initialisation du tableau de sortie
        $arrayPermission = [];
        // Pour chaque élément du tableau
        foreach($result as $value){
            // hydratation de PermissionMapping
            $arrayPermission[]= new PermissionMapping($value);
        }
        // autre manière de faire le foreach avec fonction fléchée
        // return array_map(fn($value)=> new PermissionMapping($value),$result);
        return $arrayPermission;

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