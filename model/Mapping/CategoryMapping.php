<?php

namespace model\Mapping;

use model\Abstract\AbstractMapping;
use model\Trait\TraitSlugify;
use Exception;


class CategoryMapping extends AbstractMapping
{
    // Les propriétés de la classe sont le nom des
    // attributs de la table Exemple (qui serait en
    // base de données)
    protected ?int $category_id=null;
    protected ?string $category_name=null;
    protected ?string $category_slug=null;
    protected ?string $category_description=null;
    protected ?int $category_parent=null;

    // On utilise le trait Slugify pour générer un slug
    use TraitSlugify;

    // Les getters et setters

    public function getCategoryId(): ?int
    {
        return $this->category_id;
    }

    public function setCategoryId(?int $category_id): void
    {
        if($category_id<=0) throw new Exception("ID non valide"); 
        $this->category_id = $category_id;
    }

    public function getCategoryName(): ?string
    {

        return $this->category_name;

    }

    public function setCategoryName(?string $category_name): void
    {

        $text = trim(strip_tags($category_name));
        $this->category_name = $text;
    }

    public function getCategorySlug(): ?string
    {
        return $this->category_slug;
    }

    public function setCategorySlug(?string $category_slug): void
    {
        $this->category_slug = $this->slugify($category_slug);
    }

    public function getCategoryDescription(): ?string
    {
        return $this->category_description;
    }

    public function setCategoryDescription(?string $category_description): void
    {
        $this->category_description = $category_description;
    }

    public function getCategoryParent(): ?int
    {
        return $this->category_parent;
    }

    public function setCategoryParent(?float $category_parent): void
    {
        $this->category_parent = $category_parent;
    }

    // on doit implémenter la classe abstraite du parent
    // __toString est une méthode magique qui, si on veut
    // afficher l'instance comme une chaîne de caractère
    public function __toString(): string
    {
        return "Cette instance est créée par ".self::class;
    }

}