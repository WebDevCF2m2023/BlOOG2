<?php
//creation de l espace de noms(suivant le noms des dossiers) pour que notre autoload perso soit functionelle
namespace model\mapping;

// on veux utuliser abstractmapping donc on peut utuliser use suivi du chemin vers la class (namespace)

use Exception;
//appel de la classe abstraite
use model\Abstract\AbstractMapping;
//appel du trait
use model\trait\TraitSlugify;

class mappingTag extends AbstractMapping {
//propriete
protected ?int $tag_id;
protected ?string $tag_slug;

//creation des methode de type setter appeler lors de la creation d'un objet via l hydratation

public function setTagId(int $id){
    if ($id<1) throw new Exception("id du tag no valide");
    $this -> tag_id = $id;
}

//appel du trait dans la class ou on souhaite l 'utuliser (le chemin complet)

use TraitSlugify;

public function setTagSlug(string $slug){
    //model\trait\traitslugify
    $this -> tag_slug = $this->slugify($slug);
}



// on doit implementer la class abstraite du parent 
//to string est une methode magic si on veux afficher l instance comme une chaine de caracter
public function __toString():string
{
    return "cette instance  est cree par".self::class;
}

}