<?php

// definim constantele globale ale site-ului
define('APP_PATH', 'app/'); // este accesibilia global
define('MODELS', 'models/');
define('VIEWS', 'views/');
define('CONTROLLERS', 'controllers/');

// autoloader-ul pentru instantierea claselor
spl_autoload_register(function($className){
    $relPath = '';
    $class = strtolower($className);

    if(substr_count($class, 'controller')) $relPath = CONTROLLERS;
    if(substr_count($class, 'model')) $relPath = MODELS;
    // if(substr_count($class, 'view')) $relPath = VIEWS;

    if($relPath == '') die('invalid PATH!');
    $filePath = APP_PATH.$relPath.$className.'.php';

    if(file_exists($filePath)){
        require_once $filePath;
    }
    else die('File NOT found!');
});
 
