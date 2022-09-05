<?php

class Producto
{
    private $id;
    private $categoria_id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $stock;
    private $oferta;
    private $fecha;
    private $imagen;
    private $db;


    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getCategoria_id()
    {
        return $this->categoria_id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function getStock()
    {
        return $this->stock;
    }

    public function getOferta()
    {
        return $this->oferta;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function getImagen()
    {
        return $this->imagen;
    }

    public function getDb()
    {
        return $this->db;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setCategoria_id($categoria_id)
    {
        $this->categoria_id = $categoria_id;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $this->db->real_escape_string($descripcion);
    }

    public function setPrecio($precio)
    {
        $this->precio = $this->db->real_escape_string($precio);
    }

    public function setStock($stock)
    {
        $this->stock = $this->db->real_escape_string($stock);
    }

    public function setOferta($oferta)
    {
        $this->oferta = $this->db->real_escape_string($oferta);
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }

    public function getAll()
    {
        $productos = $this->db->query("SELECT * FROM productos  ORDER BY id DESC");
        return $productos;
    }
    public function getAllCategory()
    {

        $categorias = $this->db->query("SELECT p*, c.nombre as nombrecat FROM  productos p JOIN categorias c USING p.id = c.categoria_id ORDER BY id DESC");
        return $categorias;
    }
    public function getOne()
    {
        $producto = $this->db->query("SELECT * FROM productos  WHERE id = '{$this->getId()}'");
        return $producto->fetch_object();
    }

    public function getRandom($limit)
    {
        $productos =  $this->db->query("SELECT * FROM productos ORDER BY RAND() LIMIT $limit");
        return $productos;
    }


    public function save()
    {

        $sql = "INSERT INTO `productos` (`id`, `categoria_id`, `nombre`, `descripcion`, `precio`, `stock`, `oferta`, `fecha`, `imagen`) 
        VALUES (NULL, '{$this->getCategoria_id()}', '{$this->getNombre()}', '{$this->getDescripcion()}', '{$this->getprecio()}', '{$this->getStock()}', null, CURDATE(), '{$this->getImagen()}')";


        $save = $this->db->query($sql);
        $result = false;
        if ($save) {

            $result = true;
        }
        return $result;
    }


    public function editar()
    {

        $sql = "UPDATE productos SET categoria_id = '{$this->getCategoria_id()}', nombre = '{$this->getNombre()}', descripcion =  '{$this->getDescripcion()}', precio = '{$this->getprecio()}', stock = '{$this->getStock()}'";
        if ($this->getImagen() != null) {

            $sql .= ", imagen = '{$this->getImagen()}'";
        }
        $sql .= "WHERE id = '{$this->getId()}'";

        $save = $this->db->query($sql);
        $result = false;
        if ($save) {

            $result = true;
        }
        return $result;
    }
    public function delete()
    {

        $sql = "DELETE FROM productos WHERE id = '{$this->getId()}'";
        $eliminarProducto = $this->db->query($sql);
        $result = false;
        if ($eliminarProducto) {

            $result = true;
        }
        return $result;
    }
}
