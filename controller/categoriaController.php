<?php
require_once 'models/categoria.php';
class categoriaController
{
    public function index()
    {

        Utils::isAdmin();
        $categoria = new categoria();
        $categorias = $categoria->getAllCategorias();
        require_once 'views/categoria/index.php';
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
