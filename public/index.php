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

<<<<<<< HEAD
echo PROJECT_DIRECTORY. "<br>"





=======
// on peu utilisé l'ecritire longue pour appeler une classe
// via
$tag1 = new \model\Mapping\MappingTag([
    'tag_id' => 8,
    'tag_slag' => "php-8.4",
    "Je m'amuse beaucoup!"
]);

//maniére courte l'alias n'est créé que si on a 2 classes
//qui portent le meme nom
use Model\Mapping\MappingTag as lulu;
    
$tag2 = new MappingTag([
    'tag_id' => 13,
    'tag_slag' => "php-9",
    'Arggg_Ho_Tempo' => "12453"
]);


$tag2 = new MappingTag([
    'tag_id'=>15,
    'tag_slug'=> "J'aimerais que ceci soit un slug",
]);

var_dump($tag1)($tag2);


//exemple : $test = newClasse();
>>>>>>> bac4788fa99b6a5856a0668ddaae3ffc1b070b00
