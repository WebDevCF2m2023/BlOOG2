<?php
// création de l'espace de nom (suivant le nom des dossiers)
// 
namespace model\Mapping;

use model\Abstract\AbstractMapping;

class MappingTag extends AbstractMapping {

    // propriétées

    protected $tag_id;
    protected $tag_slug;

    // création des méthodes de type setter
    // appelées lors de la création de l'objet
    // pour hydrater les propriétées

    public function setTagId($id){

        $this->tag_id = $id;

    }

    public function setTagSlug(string $slug){

        $this->tag_slug = $slug;

    }

}