<?php



use App\Controller\UserController;

require_once 'vendor/autoload.php';

$userController = new UserController();
echo $userController->getUser();
