<?php

// session

use model\Mapping\MappingTag;

session_start();

// Appel de la config
require_once "../config.php";

// our autoload
spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    require PROJECT_DIRECTORY.'/' .$class . '.php';
});

// our router

?>
<h1>Accueil</h1>
