<?php
// création de l'espace de nom (suivant le nom des dossiers)
// pour que notre autoload perso soit fonctionnel
namespace model\Mapping;

// on veut utiliser AbstractMapping, donc on peut utiliser
// use suivi du chemin vers la classe (namespace)
use Exception;
//appel de la classe abstraite
use model\Abstract\AbstractMapping;
//appel du trait
use model\Trait\TraitSlugify;
class MappingTag extends AbstractMapping{
    // propriétées
    protected ?int $tag_id;
    protected ?string $tag_slug;

    // création des méthodes de type setter
    // appelées lors de la création d'un objet
    // via l'hydratation
    public function setTagId(int $id){
        if($id<1)throw new Exception("id du tag non valide");
        $this->tag_id = $id;
    }

    //appel du trait dans làclasse ou on souhaite l'utiliser(le chemin complet est en haut de fichier)
    use  TraitSlugify;

    public function setTagSlug(string $slug)
    {
        //utilisation de slugify() qui vient du trait
        //model\trait>TraitSlugify;
        $this->tag_slug = $this->slugify($slug);

}
// on doit implementer la classe abstrait du parent
// __toString ent une méthode magique qui, si on veut afficher l'instance comme une chaine de caractère
   abstract public function __toString(): string{
    return "cette instance est créée par ".self::class;
   }
}