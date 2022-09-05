<?php
class pedidoController
{
    public function hacer()
    {

        require_once 'views/pedido/hacer.php';
    }

    public function add()
    {


        if (isset($_SESSION['identity'])) {
            //guardar los datos del pedido en base de datos

        } else {
            //si no esta identifcad rdirigit al index

            header("Location:" . base_url);
        }
        var_dump($_POST);
    }
}
