<?php
class Utils
{

    public static function deleteSesion($nombreSesion)
    {

        if (isset($_SESSION)) {
            $_SESSION[$nombreSesion] = null;
            unset($_SESSION[$nombreSesion]);
        }
        return $nombreSesion;
    }
    public static function isAdmin()
    {
        if (!isset($_SESSION['admin'])) {
            header("Location:" . base_url);
        } else {
            return true;
        }
    }

    public static function showCategorias()
    {
        require_once 'models/categoria.php';
        $categoria = new categoria();
        $categorias = $categoria->getAllCategorias();
        return $categorias;
    }

    public static function statsCarrito()
    {
        $stats = array(

            'count' => 0,
            'total' => 0
        );
        if (isset($_SESSION['carrito'])) {
            $stats['count'] = count($_SESSION['carrito']);

            foreach ($_SESSION['carrito'] as $producto) {
                $stats['total'] += $producto['precio'] * $producto['unidades'];
            }
        }
        return $stats;
    }

    public static function isIdentity()
    {
        if (!isset($_SESSION['identity'])) {
            header("Location:" . base_url);
        } else {
            return true;
        }
    }

    public static function showEstado($status)
    {
        $value = 'pendiente';
        if ($status == 'confirm') {
            $value = 'pendiente';
        } elseif ($status == 'preparation') {

            $value = "en preparacion";
        } elseif ($status == 'ready') {
            $value = "preparado";
        } elseif ($status == 'sended') {
            $value = "enviado";
        }

        return $value;
    }
}
