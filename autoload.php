<?php
function controllers_autoload($className)
{
    include 'controller/' . $className . '.php';
}

spl_autoload_register('controllers_autoload');
