<?php
//création de l'espace de nom (suivant le noms des dossiers)
//pour que notre autoload perso soit fonctionnel
namespace model\Mapping;

//on veux utilisé AbstractMapping, donc ont peu utilisé use suivi du chemin vers la class (namespace)

use Exception;
//appel de la clasee abstraite
use model\Abstract\AbstractMapping;
//appel du trait
use model\Trait\TraitSlugify;

class MappingTag extends AbstractMapping{
    //propriétées
    protected ?int $tag_id;
    protected ?string $tag_slug;

    //création des méthodes de type setter
    //appelées lors de la création d'un objet
    //via l'hydratation
    public function settagId(int $id){
        if($id<1) throw new Exception("Id du tag non valide");
        $this->tag_id = $id;
    
    }





        public function seryTagSlug(string $tag_slug)
        {
            $tag_slug = $slug;
        }
    }

}

//Appel di trait DANS la classe ou ont souhaite
    //l'utiliser (le chemin complet est en haut du fichier)
    use TraitSlugify;

    public function setTagSlug(string$slug){

    }
//utilisation du slugify () qui vient du trait
//model\trait\TraitSlugify
$this->tag_slug = $this->
