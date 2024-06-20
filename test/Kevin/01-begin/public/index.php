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

echo PROJECT_DIRECTORY . '<br>';

$tag1 = new MappingTag([
    'tag_id'=> 7,
    'tag_slug'=> 'php-8',
]);

$tag2 = new MappingTag([
    'tag_id' => 15,
    'tag_slug' => 'Slug moi oui vas y'
]);
echo $tag2;
var_dump($tag1, $tag2);