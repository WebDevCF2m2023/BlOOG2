<?php
use model\Manager\CategoryManager;

$categoryManager = new CategoryManager($db);

$categories = $categoryManager->selectAllForMenu();

var_dump($categories);

// exemple template
echo $twig->render('publicView/public.homepage.html.twig');