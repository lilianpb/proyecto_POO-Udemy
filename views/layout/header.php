<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Camisetas</title>
    <link rel="stylesheet" href="<?= base_url ?>assets/css/styles.css">
</head>

<body>
    <!--  <h1>Cabecera</h1>  -->

    <div id="container">

        <header id="header">
            <div id="logo">
                <img src="<?= base_url ?>assets/img/camiseta.png" alt="Camiseta">
                <a href="<?= base_url ?>">
                    <h1>Tienda de Camisetas</h1>
                </a>

            </div>
        </header>
        <!--  <h1>Menu</h1>  -->
        <?php $categorias = Utils::showCategorias();
        ?>

        <nav id="menu">

            <ul>
                <li><a href="<?= base_url ?>">Inicio</a></li>
                <?php while ($categoria = $categorias->fetch_object()) : ?>
                    <li><a href="<?= base_url ?>categoria/ver&id=<?= $categoria->id ?>"><?= $categoria->nombre ?></a></li>
                <?php endwhile ?>

            </ul>
        </nav>

        <div id="content">