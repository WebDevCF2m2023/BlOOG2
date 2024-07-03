<?php

#creation ou utilisation de l'espace de nom
namespace model\Manager;

use PDO;

use model\Abstract\AbstractMapping;
use model\Interface\InterfaceManager;
use model\Mapping\PermissionMapping;

use Exception;

class PermissionManager implements InterfaceManager{

    //propriete qui stock notre conenxtion 
    protected ?PDO $db = null;
 
    public function __construct(PDO $pdo){
        $this->db=$pdo;
    }


    
    public function selectAll():?array
    {
        $query = $this->db->query("SELECT * FROM `permission`");
        if($query->rowCount()===0) return null;

        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        $query->closeCursor();

        $arrayPermission = [];

        foreach($result as $value){
            // on remplit un nouveau tableau contenant les commentaires
            $arrayPermission[] = new PermissionMapping($value);
        }
        return $arrayPermission;
    }


    public function selectOneById(int $id): null|string|PermissionMapping{

        $sql = "SELECT * FROM `permission` WHERE `permission_id`= ?";
        $prepare = $this->db->prepare($sql);

        try{
            $prepare->bindValue(1,$id, PDO::PARAM_INT);
            $prepare->execute();

            // pas de résultat = null
            if($prepare->rowCount()===0) return null;

            // récupération des valeurs en tableau associatif
            $result = $prepare->fetch(PDO::FETCH_ASSOC);

            // création de l'instance PermissionMapping
            $result = new PermissionMapping($result);

            $prepare->closeCursor();
            
            return $result;
        }catch(Exception $e){
            return $e->getMessage();
        }
    }



    // insérera uniquement des enfants de AbstractMapping

    public function insert(AbstractMapping $mapping): bool|string{
        
// requête préparée
$sql = "INSERT INTO `permission`(`permission_name`, `permission_description` )  VALUES (?,?)";
$prepare = $this->db->prepare($sql);

try{
    $prepare->bindValue(1,$mapping->getPermissionName());
    $prepare->bindValue(2,$mapping->getPermissionDescription());


    $prepare->execute();

    $prepare->closeCursor();

    return true;

}catch(Exception $e){
    return $e->getMessage();
}
}

    public function update(AbstractMapping $mapping){
         // requête préparée
         $sql = "UPDATE `permission` SET `permission_name`=?, `permission_description`=? WHERE `permission_id`=?";
         // mise à jour de la date de modification
         $prepare = $this->db->prepare($sql);
 
         try{
            $prepare->bindValue(1,$mapping->getPermissionName());
            $prepare->bindValue(2,$mapping->getPermissionDescription());
            $prepare->bindValue(3,$mapping->getPermissionId(), PDO::PARAM_INT);

 
             $prepare->execute();
 
             $prepare->closeCursor();
 
             return true;
 
         }catch(Exception $e){
             return $e->getMessage();
         }

    }


    public function delete(int $id){
        
 // requête préparée

        $sql = "DELETE FROM `permission` WHERE `permission_id`=?";

        $prepare = $this->db->prepare($sql);

        try{
            $prepare->bindValue(1,$id, PDO::PARAM_INT);

            $prepare->execute();

            $prepare->closeCursor();

            return true;

        }catch(Exception $e){
            return $e->getMessage();
        }
        
    }


    }
