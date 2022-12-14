<?php
require_once 'models/usuario.php';

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

            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;


            if ($nombre && $apellidos && $email && $password) {
                $usuario = new Usuario();


                $usuario->setNombre($nombre);
                $usuario->setApellidos($apellidos);
                $usuario->setEmail($email);
                $usuario->setPasswordd($password);

                $save = $usuario->save();

                if ($save) {

                    $_SESSION['register'] = "complete";
                } else {

                    $_SESSION['register'] = "failed";
                }
            } else {

                $_SESSION['register'] = "failed";
            }
        } else {

            $_SESSION['register'] = "failed";
        }
        header("Location" . base_url . "usuario/registro");
    }

    public function login()
    {

        if (isset($_POST)) {

            //identificar al usuario

            //consulta a la base de datos para comribar credenciales

            $usuario = new Usuario();
            $usuario->setEmail($_POST['email']);
            $usuario->setPasswordd($_POST['password']);
            $identity = $usuario->login();


            if ($identity && is_object($identity)) {
                $_SESSION['identity'] = $identity;


                if ($identity->rol == 'admin') {
                    $_SESSION['admin'] = true;
                }
            } else {

                //crear session

                $_SESSION['error_login'] = "identificacion fallida";
            }
        }
        header("LOcation:" . base_url);
    }
    public function logout()
    {
        if (isset($_SESSION['identity'])) {
            unset($_SESSION['identity']);
        }
        if (isset($_SESSION['admin'])) {
            unset($_SESSION['admin']);
        }
        header("Location: " . base_url);
    }
}
