<?php
session_start();
require_once 'autoload.php';
require_once 'config/db.php';
require_once 'config/parameters.php';
require_once 'helpers/utils.php';
require_once 'views/layout/header.php';
require_once 'views/layout/sidebar.php';



function show_error()
{
    $error = new errorController();
    $error->index();
}

# Defino quien es el controlador
if (isset($_GET['controller'])) {
    $nombre_controlador = $_GET['controller'] . 'Controller';
} elseif (!isset($_GET['controller'])) {
    $nombre_controlador = DEFAULT_CONTROLLER;
} else {
    show_error();
    exit();
}

if (!class_exists($nombre_controlador)) {
    show_error();
    exit();
}

$controlador = new $nombre_controlador();

# Defino a que método/action voy a llamar

if (isset($_GET['action']) && method_exists($controlador, $_GET['action'])) {
    $action = $_GET['action'];
    $controlador->$action();
} elseif (!isset($_GET['action'])) {
    $action =  DEFAULT_ACTION;
    $controlador->$action();
} else {
    show_error();
}


require_once 'views/layout/footer.php';
