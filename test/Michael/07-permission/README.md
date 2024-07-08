# PHP OO
## Mapping d'une table `permission`

Dans le fichier `model\Mapping\Permission.php`, se trouve le mapping de la table `permission` de la DB `bloog`

### Mapping de base de `permission`

Doit être appelé avec un include ou require depuis `index.php` :

```php
# public/index.php
# ...
require '../model/Mapping/Permission.php';
$perm1 = new Permission(5,"coucou","Excuse moi Greg, c'est vrai, je me tais!");

// Affichage grâce aux getters
echo $perm1->getPermissionId();
```

Sans autoload, sans hydratation, sans sécurisation des setters, sans namespace :
```php
<?php
class Permission{

    /*
    Propriétées - équivalence de variable
    Porte les noms de nos champs dans la DB
    */
    private ?int $permission_id = null; 
    private ?string $permission_name = null;
    private ?string $permission_description = null;

    /*
    Constantes
    */

    /*
    Méthodes
    */

    // appelé lors de l'instanciation (new Permission())
    public function __construct(int $permission_id, string $permission_name, string $permission_description)
    {
        // utilisation des setters
        $this->setPermissionId($permission_id);
        $this->setPermissionName($permission_name);
        $this->setPermissionDescription($permission_description);
    }

    // Pour récupérer une propriété private (ou protected)
    // getters ou accessors
    public function getPermissionId(): ?int
    {
        return $this->permission_id;
    }

    public function getPermissionName(): ?string
    {
        return $this->permission_name;
    }

    public function getPermissionDescription(): ?string
    {
        return $this->permission_description;
    }

    // Pour modifier une propriété private (ou protected)
    // setters ou mutators
    public function setPermissionId(?int $permission_id): void
    {
        $this->permission_id = $permission_id;
    }

    public function setPermissionName(?string $permission_name): void 
    {
        $this->permission_name = $permission_name;
    }

    public function setPermissionDescription(?string $permission_description): void 
    {
        $this->permission_description = $permission_description;
    }
}
```

### Création de l'autoload

Dans index.php :

```php
// notre autoload
spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    require PROJECT_DIRECTORY.'/' .$class . '.php';
});
```

Dans Permission.php

```php
namespace model\Mapping;
```

Puis pour l'utiliser, dans index.php

```php
// pour indiquer à l'autoload le chemin de notre classe
use model\Mapping\Permission;
```

Donc :

```php
<?php
// chargement dépendance
require_once "../config.php";

// pour indiquer à l'autoload le chemin de notre classe
use model\Mapping\Permission;


// notre autoload qui fonctionne avec les noms de dossiers/fichiers 
// depuis la racine
spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    require PROJECT_DIRECTORY.'/' .$class . '.php';
});

// Connexion à la DB
$db = new PDO( DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME.";port=".DB_PORT.";charset=".DB_CHARSET,
DB_LOGIN,
DB_PWD);
// tableau associatif en fetch associatif
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$perm1 = new Permission(5,"coucou","Excuse moi Greg, c'est vrai, je me tais!");

// Affichage grâce aux getters
echo $perm1->getPermissionId();

var_dump($perm1);
```

### Utilisation de la classe abstraite

Celle-ci contient l'hydratation et le constructeur

```php
#model/Abstract/AbstractMapping.php
# 
<?php

// Espace de nom (isolation du code)
namespace model\Abstract;

// Classe abstraite qui ne peut être instanciée.
// Elle est la base de tous les mappings de tables
abstract class AbstractMapping
{
    // constructeur - Appelé lors de l'instanciation
    public function __construct(array $tab)
    {
        // tentative d'hydration des données des classes enfants
        $this->hydrate($tab);
    }

    // création de notre hydratation, en partant d'un tableau associatif et de ses clefs,
    // on va régénérer le nom des setters existants dans les classes enfants
    protected function hydrate(array $assoc): void
    {
        // tant qu'on a des éléments dans le tableau
        foreach ($assoc as $key => $value) {

            // création du nom d'un setter (méthode publique de modification)
            $tab = explode("_", $key);
            $majuscule = array_map('ucfirst', $tab);
            $newNameCamelCase = implode($majuscule);
            $methodeName = "set" . $newNameCamelCase;

            // si la méthode existe
            if (method_exists($this, $methodeName)) {
                // on hydrate le paramètre avec la valeur
                $this->$methodeName($value);
            } else {
                // sinon, on affiche un message d'erreur (à commenter en prod)
                echo "$methodeName n'est pas un setter valide<br>";
            }
        }
    }
}

```

On l'utilise dans tous nos mapping en ne redéclarant pas le constructeur: 

```php
<?php

namespace model\Mapping;

use model\Abstract\AbstractMapping;

class Permission extends AbstractMapping{

    /*
    Propriétées - équivalence de variable
    Porte les noms de nos champs dans la DB
    */
    private ?int $permission_id = null; 
    private ?string $permission_name = null;
    private ?string $permission_description = null;

###

    /*
    Méthodes
    */

    // Le constructeur est chargé depuis la classe abstraite (inutile de le réécrire)


    ####
}

```

### Protection des données via les setters du Mapping



## CRUD de cette table