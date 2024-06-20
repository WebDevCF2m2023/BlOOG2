<?php

namespace model\Mapping;

use model\Abstract\AbstractMapping;
use model\Trait\TraitDateTime;
use DateTime;
use Exception;

class FileMapping extends AbstractMapping
{
    // Les propriétés de la classe sont le nom des
    // attributs de la table Exemple (qui serait en
    // base de données)
    protected ?int $file_id;
    protected ?string $file_description;
    protected ?string $file_url;
    protected ?string $file_type;
  



    // Les getters et setters
    // Les getters permettent de récupérer la valeur
    // d'un attribut de la classe

    // Les setters permettent de modifier la valeur
    // d'un attribut de la classe, en utilisant l'hydratation
    // venant de la classe AbstractMapping
    public function getFileId(): ?int
    {
        return $this->file_id;
    }

    public function setFileId(?int $file_id): void
    {
        if($file_id<=0) throw new Exception("ID non valide"); 
        $this->file_id = $file_id;
    }

    public function getFileDescription(): ?string
    {
        return $this->file_description;
    }

    public function setFileDescription(?string $file_description): void
    {
        $this->file_description = $file_description;
    }

    public function getFileUrl(): ?string
    {
        return $this->file_url;
    }

    public function setFileUrl(?string $file_url): void
    {
        $this->file_url = $file_url;
    }

    public function getFileType(): ?string
    {
        return $this->file_type;
    }

    public function setFileType(?string $file_type): void
    {
        $this->file_type = $file_type;
    }

    // on doit implémenter la classe abstraite du parent 
    // __toString est une méthode magique qui, si on veut
    // afficher l'instance comme une chaîne de caractère
    public function __toString(): string
    {
        return "Cette instance est créée par ".self::class;
    }

}


// $file1 = new FileMapping([ "file_id" => 1, "file_description" => "   exemple1   ", "file_url" => "description1", "file_type" => "1"]);
// $file2 = new FileMapping([ "file_id" => 2, "file_description" => " <p>  Un autre exemple </p>", "file_url" => "Voici une description d'un être aimé", "file_type" => "83"]); 
// $file3 = new FileMapping([ "file_id" => 3, "file_description" => "Encore un \"autre\" exemple", "file_url" => "Voici une description d'un être aimé, <br>, ou non", "file_type" => "21"]);
// var_dump($file1, $file2, $file3);
?>



    
