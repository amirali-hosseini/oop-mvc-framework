<?php

require_once 'config/config.php';

function autoLoader($class)
{
    if (file_exists(APP_ROOT . '/libraries/' . $class . '.php')) {
        require_once 'libraries/' . $class . '.php';
    }
}

spl_autoload_register('autoLoader');
