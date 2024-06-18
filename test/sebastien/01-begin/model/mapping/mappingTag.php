<?php
//creation de l espace de noms(suivant le noms des dossiers) pour que notre autoload perso soit functionelle
namespace model\mapping;

// on veux utuliser abstractmapping donc on peut utuliser use suivi du chemin vers la class (namespace)

use model\Abstract\AbstractMapping;

class mappingTag extends AbstractMapping {
//propriete
protected ?int $tag_id;
protected ?string $tag_slug;

//creation des methode de type setter appeler lors de la creation d'un objet via l hydratation

public function setTagId(int $id){
    $this -> tag_id = $id;
}
public function setTagSlug(string $slug){
    $this -> tag_slug = $slug;
}

}