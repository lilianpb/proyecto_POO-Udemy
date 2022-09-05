<?php
require_once 'models/categoria.php';
require_once 'models/producto.php';
class categoriaController
{
    public function index()
    {

        Utils::isAdmin();
        $categoria = new categoria();
        $categorias = $categoria->getAllCategorias();
        require_once 'views/categoria/index.php';
    }
    public function ver()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            //conseguir categoria
            $categoria = new Categoria();
            $categoria->setId($id);
            $categoria =  $categoria->getOne();
            //conseguir producto
            $producto = new Producto();
            $producto->setCategoria_id($id);
            $productos = $producto->getAllCategory();
        }
        require_once 'views/categoria/ver.php';
    }

    public function crear()
    {
        Utils::isAdmin();
        require_once 'views/categoria/crear.php';
    }

    public function saveCategoria()
    {
        Utils::isAdmin();
        if (isset($_POST) && isset($_POST['nombre'])) {

            //guardar la categoria en base de datos
            $categoria = new Categoria();
            $categoria->setNombre($_POST['nombre']);
            $categoria->save();
        }
        header("Location:" . base_url . "categoria/index");
    }
}
