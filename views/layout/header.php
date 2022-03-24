<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="widt=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!-- GOOGLE FONTS-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">

    <title>Inventai</title>
</head>

<body>
    <div class="container">
        <header>
            <div class="header-main">
                <h2>INVENTARIO</h2>
                <?php if(isset($_SESSION['login'])):?>
                    <a href="index.php?controller=usuarioController&action=logout">
                    <?=$_SESSION['login']?> | logout
                </a>
                <?php else : ?>
                    <a href="index.php?controller=UsuarioController&action=login">
                    usuario |  login
                </a>
                <?php endif; ?>
            </div>

        </header>
        <hr>