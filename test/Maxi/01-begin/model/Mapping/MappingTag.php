<?php
// création de l'espace de nom (suivant le nom des dossiers)
// pour que notre autoload perso soit fonctionnel
namespace model\Mapping;

// on veut utiliser AbstractMapping, donc on peut utiliser
// use suivi du chemin vers la classe (namespace)
use model\Abstract\AbstractMapping;
/// appel de la classe abstraite
// appel du trait
use model\Trait\TraitSlugify;

class MappingTag extends AbstractMapping{
    // propriétées
    protected ?int $tag_id;
    protected ?string $tag_slug;

    // création des méthodes de type setter
    // appelées lors de la création d'un objet
    // via l'hydratation
    public function setTagId(int $id){
        $this->tag_id = $id;
    }

    // appel du trait dans la classe ou on souhaite l'utiliser
    //le chemin complet est en haut du dossier
    use TraitSlugify;

    public function setTagSlug(string $slug)
    {
        // utilisation de slugify() qui vient du Trait
        // model\Trait\TraitSlugify
        $this->tag_slug = $slug;
    }


// on doit implementer la classe abstraite du parent
// __toString() est une méthode magique qui, si on veut 
//afficher l'instance comme une chaine de caractère
public function __tostring(): string
{
    return "Cette instance est par " .self::class;
}

}