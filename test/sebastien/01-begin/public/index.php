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

// on peux utuliser l'ecriture long pour appelerune class via l'autoload en utulisant son namespace
$tag1= new \model\mapping\mappingTag(['tag_id'=>7,
                                      'tag_slug'=>"php-8",
                                      
                                    ]);

// manier courte l alias nest cree que si in a 2 classes qui porte le meme noms

use model\mapping\mappingTag as lulu;

$tag2= new lulu(['tag_id'=>8,
                                      'tag_slug'=>"php-8.4",
                                      
                                    ]);

use model\mapping\mappingTag;

$tag3= new mappingTag(['tag_id'=>9,
                                      'tag_slug'=>"php-9",
                                      
                                    ]);

var_dump($tag1,$tag2,$tag3);

