<?php
// création de l'espace de nom (suivant le nom des dossiers)
// pour que notre autoload perso soit fonctionnel
namespace model\Mapping;

// on veut utiliser AbstractMapping, donc on peut utiliser
// use suivi du chemin vers la classe (namespace)

use Exception;
// appel de la classe abstraite
use model\Abstract\AbstractMapping;
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
        if($id<1) throw new Exception("Id du tag non valide");
        $this->tag_id = $id;
    }
 
    // Appel du trait DANS la classe où on souhaite
    // l'utiliser (le chemin complet est en haut du fichier)
    use TraitSlugify;

    public function setTagSlug(string $slug)
    {
        // utilisation de slugify() qui vient du Trait 
        // model\Trait\TraitSlugify;
        $this->tag_slug = $this->slugify($slug);
    }

    // on doit implémenter la classe abstraite du parent
    // __toString est une méthode magique qui, si on veut
    // afficher l'instance comme une chaîne de caractère
    public function __toString(): string
    {
        return "Cette instance est créée par ".self::class;
    }
    
}