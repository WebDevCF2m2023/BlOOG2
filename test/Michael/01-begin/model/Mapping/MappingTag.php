<?php
// création de l'espace de nom (suivant le nom des dossiers)
// pour que notre autoload perso soit fonctionnel
namespace model\Mapping;

// on veut utiliser AbstractMapping, donc on peut utiliser
// use suivi du chemin vers la classe (namespace)

use Exception;
use model\Abstract\AbstractMapping;


class MappingTag extends AbstractMapping{
    // propriétées
    protected ?int $tag_id;
    protected ?string $tag_slug;

    // création des méthodes de type setter
    // appelées lors de la création d'un objet
    // via l'hydratation
    public function setTagId(int $id){
        if($id<1) throw new Exception("Id du tag non valide");
        $this->tag_id = $id;
    }

    public function setTagSlug(string $slug)
    {
        $this->tag_slug = $slug;
    }
}