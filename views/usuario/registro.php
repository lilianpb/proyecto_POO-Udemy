<h1>Registrarse</h1>

<form action="index.php?controller=usuario&action=saveUser" method="POST">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" placeholder="Introduzca su nombre">


    <label for="apellidos">Apellidos</label>
    <input type="text" name="apellidos" placeholder="Introduzca su apellidos">

    <label for="email">Email</label>
    <input type="email" name="email" placeholder="Introduzca su email">

    <label for="password">Contraseña</label>
    <input type="password" name="password" placeholder="Introduzca su contraseña">

    <input type="submit" value="Registrarse">

</form>