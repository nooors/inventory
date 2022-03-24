<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="widt=device-width, initial-scale=1">
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
            integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l"
            crossorigin="anonymous">

        <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script> -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script
            src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>
    <title>Inventai</title>
    <!-- <script> $(document).ready(function () { $("#mostrarmodal").modal("show");
    }); </script> -->
</head>
<body style="background-color:ivory">
    <!-- Button to Open the Modal <button type="button" class="btn btn-primary"
    data-toggle="modal" data-target="#myModal"> Open modal </button> -->
    <!-- The Modal -->
    <!--<div class="modal fade" id="mostrarmodal" data-bs-backdrop="static"
    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
    aria-hidden="true"> <div class="modal-dialog"> <div class="modal-content"> -->

    <!-- Modal Header -->
    <!-- <div class="modal-header"> <h4 class="modal-title">Modal Heading</h4>
    <button type="button" class="close" data-dismiss="modal">&times;</button> </div>
    -->

    <!-- Modal body -->
    <!-- <div class="modal-body"> Modal body.. </div> Modal footer <div
    class="modal-footer"> <button type="button" class="btn btn-danger"
    data-dismiss="modal">Close</button> </div> </div> </div> </div>-->
    <div class="container">

    <header>
        <div class="row justify-content-center">
            <div
                class="col border border-right-0 border-left-0 border-top-0"
                style="background-color: indigo; color: ivory;">
                <h1 class="pt-3 pb-0 my-0 text-center">CABECERA</h1>
                <p class="h5 pb-0 text-right align-bottom">
                <?php if(isset($_SESSION['login'])): ?>
                    <?=$_SESSION['login']?>  |  
                    <a href="index.php?controller=usuarioController&action=logout" style="color: ivory;">
                      logout
                    </a>
                <?php else: ?>
                    usuario  | 
                    <a href="index.php?controller=UsuarioController&action=login" style="color: ivory;">
                      login
                    </a>
                <?php endif; ?>
                </p>
            </div>
        </div>
    </header>
