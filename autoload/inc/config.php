<?php

function __autoload($class){
    $dirName = 'class';

    if(file_exists("{$dirName}/{$class}.php")):
        require_once ("{$dirName}/{$class}.php");
    else:
        die("class {$class}.php not found");
    endif;
}