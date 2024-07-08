<?php
use model\Manager\CategoryManager;

$categoryManager = new CategoryManager($db);

$categories = $categoryManager->selectAllForMenu();

$menu = $categoryManager->buildMenu($categories);


// exemple template
echo $twig->render('publicView/public.homepage.html.twig', [
    'menu' => $menu,
]);