<?php 

// autoloader to load classes for better management
spl_autoload_register('autoloader');

function autoloader($className) {
    $classFile = __DIR__ . '/../classes/' . $className . '.class.php';

    if (file_exists($classFile)) {
        include_once $classFile;
    }
}
