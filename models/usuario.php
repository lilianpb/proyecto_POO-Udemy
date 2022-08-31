<?php

class Usuario
{
    private int $id;
    private string $nombre;
    private ?string $apellidos;
    private string $email;
    private string $passwordd;
    private ?string $rol;
    private ?string $imagen;
    //conexion a basse de datis

    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
        $this->apellidos = null;
        $this->rol = null;
        $this->imagen = null;
    }

    public function  getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function  getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    public function getApellidos(): ?string
    {
        return  $this->apellidos;
    }

    public function setApellidos(?string $apellidos): void
    {
        $this->apellidos = $this->db->real_escape_string($apellidos);
    }

    public function  getEmail()
    {
        return  $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $this->db->real_escape_string($email);
    }


    public function  getPasswordd()
    {
        return  password_hash($this->db->real_escape_string($this->passwordd), PASSWORD_BCRYPT, ['cost' => 4]);
    }

    public function setPasswordd($passwordd)
    {
        $this->passwordd = $passwordd;
    }

    public function  getRol()
    {
        return  $this->rol;
    }

    public function setRol($rol)
    {
        $this->rol = $this->db->real_escape_string($rol);
    }


    public function  getImagen()
    {
        return $this->imagen;
    }

    public function setImagen($imagen)
    {
        $this->nombre = $imagen;
    }


    public function save()
    {
        $rolUser = 'admin';
        $sql = "INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `email`, `passwordd`, `rol`, `imagen`) 
        VALUES (NULL, '{$this->getNombre()}', '{$this->getApellidos()}', '{$this->getEmail()}', '{$this->getPasswordd()}', '$rolUser', null)";

        // $sql = "INSERT INTO usuarios VALUES 
        // (null,'{$this->getNombre()}','{$this->getApellidos()}','{$this->getEmail()}','{$this->getPasswordd()}','user',null)";

        $save = $this->db->query($sql);
        $result = false;
        if ($save) {

            $result = true;
        }
        return $result;
    }

    public function login()
    {

        $email = $this->email;
        $passwordd = $this->passwordd;
        //comrobr si existe user
        $sql = "SELECT * FROM usuarios WHERE email = '$email'";
        $login = $this->db->query($sql);
        if ($login && $login->num_rows == 1) {
            $usuario = $login->fetch_object();

            //verificar contraseña

            $verify = password_verify($passwordd, $usuario->passwordd);
            $result = false;
            if ($verify) {

                $result = $usuario;
            }
        }
        return $result;
    }
}//fin clase
