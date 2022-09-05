<?php
include_once 'models/pedido.php';
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
            $usuario_id = $_SESSION['identity']->id;

            $provincia = isset($_POST['provincia']) ? $_POST['provincia'] : false;
            $localidad = isset($_POST['localidad']) ? $_POST['localidad'] : false;
            $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;
            $stats = Utils::statsCarrito();
            $coste = $stats['total'];
            if ($provincia && $localidad && $direccion) {

                $pedido = new Pedido();
                $pedido->setUsuario_id($usuario_id);
                $pedido->setProvincia($provincia);
                $pedido->setLocalidad($localidad);
                $pedido->setDireccion($direccion);
                $pedido->setCoste($coste);

                $save = $pedido->save();

                //guardar linea pedido
                $save_linea = $pedido->saveLinea();

                if ($save && $save_linea) {

                    $_SESSION['pedido'] = "complete";
                } else {
                    $_SESSION['pedido'] = "failed";
                }
            } else {

                $_SESSION['pedido'] = "failed";
            }

            header("Location:" . base_url . "pedido/confirmado");
        } else {
            //si no esta identifcad rdirigit al index

            header("Location:" . base_url);
        }
    }

    public function confirmado()
    {
        if (isset($_SESSION['identity'])) {
            $identity =  $_SESSION['identity'];
            $pedido = new Pedido();
            $pedido->setUsuario_id($identity->id);

            $pedido = $pedido->getOneByUser();

            $pedidoProductos = new Pedido();
            $productos = $pedidoProductos->getProductsBypedido($pedido->id);
            require_once 'views/pedido/confirmado.php';
        }
    }
}
