<?php
class usuarioController
{
    public function index()
    {

        echo "controlador usuarios, accion index";
    }

    public function registro()
    {
        require_once 'views/usuario/registro.php';
    }
    public function saveUser()
    {

        if (isset($_POST)) {
            var_dump($_POST);
        }
        echo "controlador usuarios, accion index";
    }
}
