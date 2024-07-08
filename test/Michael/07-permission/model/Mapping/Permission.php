<?php

namespace model\Mapping;

use model\Abstract\AbstractMapping;
use Exception;

class Permission extends AbstractMapping{

    /*
    Propriétées - équivalence de variable
    Porte les noms de nos champs dans la DB
    */
    private ?int $permission_id = null; 
    private ?string $permission_name = null;
    private ?string $permission_description = null;

    /*
    Constantes
    */

    /*
    Méthodes
    */

    // Le constructeur est chargé depuis la classe abstraite (inutile de le réécrire)


    // Pour récupérer une propriété private (ou protected)
    // getters ou accessors
    public function getPermissionId(): ?int
    {
        return $this->permission_id;
    }

    public function getPermissionName(): ?string
    {
        return $this->permission_name;
    }

    public function getPermissionDescription(): ?string
    {
        return $this->permission_description;
    }

    // Pour modifier une propriété private (ou protected)
    // setters ou mutators
    public function setPermissionId(?int $permission_id): void
    {
        // on vérifie que $permission_id est égal ou petit que 0
        if($permission_id <= 0) throw new Exception("ID non valide");
        $this->permission_id = $permission_id;
    }

    public function setPermissionName(?string $permission_name): void 
    {
        $this->permission_name = trim(htmlspecialchars(strip_tags($permission_name), ENT_QUOTES));
    }

    public function setPermissionDescription(?string $permission_description): void 
    {
        $this->permission_description = trim(htmlspecialchars($permission_description,ENT_QUOTES));
    }
}