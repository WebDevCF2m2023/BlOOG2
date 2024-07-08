<?php

namespace model\Manager;

use model\Abstract\AbstractMapping;
use model\Interface\InterfaceManager;
use model\Interface\InterfaceSlugManager;
use model\Mapping\CategoryMapping;
use PDO;
use Exception;


class CategoryManager implements  InterfaceManager, InterfaceSlugManager
{

    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }



    public function selectAll()
    {
        $sql = "SELECT * FROM category";
        $query = $this->pdo->query($sql);
        return $query->fetchAll();
    }



    public function selectAllForMenu()
    {
        $sql = "SELECT c.category_id, c.category_name, c.category_slug, c.category_parent FROM category c";
        $query = $this->pdo->query($sql);
        $categories = $query->fetchAll(PDO::FETCH_ASSOC);

        // Convertion des données en objets
        $categoriesById = [];
        foreach ($categories as $category) {
            $categoriesById[$category['category_id']] = new CategoryMapping($category);
        }

        // Appel de la méthode récursive pour construire la hiérarchie
        return $this->buildHierarchy($categoriesById);
    }

    // récursive pour construire la hiérarchie des catégories
    private function buildHierarchy(&$categories, $parentId = 0)
    {
        $hierarchy = [];
        foreach ($categories as $id => $category) {
            if ($category->getCategoryParent() == $parentId) {
                // On cherche les enfants
                $children = $this->buildHierarchy($categories, $id);
                // si on a des enfants
                if ($children) {
                    // on les ajoute à la catégorie
                    $category->setChildren($children);
                }
                $hierarchy[$id] = $category;
            }
        }
        return $hierarchy;
    }

    // création d'un menu déroulant en ul li pour les catégories en partant
    // du résultat de selectAllForMenu()

public function buildMenu(array $categories, $parentId = 0)
{
    // Début du menu. Si parentId est 0, c'est le menu principal, sinon c'est un sous-menu
    $menu = $parentId == 0 ? "<ul class='navbar-nav me-auto mb-2 mb-lg-0'>" : "<ul class='dropdown-menu'>";

    foreach ($categories as $category) {
        // Vérifie si la catégorie courante doit être affichée à ce niveau du menu
        if ($category->getCategoryParent() == $parentId) {
            // Vérifie si la catégorie a des enfants pour décider du type de lien à créer
            if (!empty($category->getChildren())) {
                // Crée un élément de menu déroulant pour les catégories ayant des enfants
                $menu .= "<li class='nav-item dropdown'>";
                $menu .= "<a class='nav-link dropdown-toggle' href='#' id='navbarDropdown" . $category->getCategoryId() . "' role='button' data-bs-toggle='dropdown' aria-expanded='false'>" . htmlspecialchars($category->getCategoryName()) . "</a>";
                // Appel récursif pour construire le sous-menu des enfants
                $menu .= $this->buildMenu($category->getChildren(), $category->getCategoryId());
            } else {
                // Crée un élément de menu standard pour les catégories sans enfants
                $menu .= "<li class='nav-item'><a class='nav-link' style='color: #1a1e21' href='?" . htmlspecialchars($category->getCategorySlug()) . "'>" . htmlspecialchars($category->getCategoryName()) . "</a>";
            }
            $menu .= "</li>";
        }
    }

    $menu .= "</ul>";

    return $menu;
}





    public function selectOneById(int $id)
    {
        // TODO: Implement selectOneById() method.
    }

    public function insert(AbstractMapping $mapping)
    {
        // TODO: Implement insert() method.
    }

    public function update(AbstractMapping $mapping)
    {
        // TODO: Implement update() method.
    }

    public function delete(int $id)
    {
        // TODO: Implement delete() method.
    }

    public function selectOneBySlug(string $slug): object
    {
        // TODO: Implement selectOneBySlug() method.
    }
}