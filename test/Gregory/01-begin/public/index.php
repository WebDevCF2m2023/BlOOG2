<?php

// session
session_start();

// Appel de la config
require_once "../config.php";

// our autoload
spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    require PROJECT_DIRECTORY.'/' .$class . '.php';
});

echo PROJECT_DIRECTORY."<br>";

// on peut utiliser l'écriture longue pour appeler une classe
// via l'autoload en utilisant son namespace
$tag1 = new \model\Mapping\MappingTag([
    'tag_id' => 7,
    'tag_slug' => "php-8",
    "Je m'amuse beaucoup !"=>"14",
    "Nimporte_Quoi"=>"yep",
]);

// manière courte l'alias n'est créé que si on a 2 classes 
// qui portent le même nom
use model\Mapping\MappingTag as lulu;

$tag2 = new lulu([
    'tag_id' => 8,
    'tag_slug' => "php-8.4",
]);

use model\Mapping\MappingTag;

$tag3 = new MappingTag([
    'tag_id' => 13,
    'tag_slug' => "php-9",
    'Argggg_ho_tempo' => 164862,
]);

$tag4 = new MappingTag([
    "tag_id"=>15,
    "tag_slug"=>"pomme de terre"
]);

var_dump($tag1, $tag2, $tag3, $tag4);
