<?php
session_start();
include("includes/conn.php");
include("includes/antiinjection.php");
include("includes/session.php");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>doçurinha</title>

    <!-- assets -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="css/animate.css" rel="stylesheet" type="text/css">
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">

    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/f55d5a44cf.js"></script>

    <!-- default css -->
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="main h-100">

        <div class="top-absolute d-none d-sm-none d-md-block">
            <div class="top-header">
            </div>
            <div class="triangle animated bounce">
                &nbsp;
            </div>
        </div>
        <div class="card-wrap h-100 align-items-center justify-content-center d-flex">
            <div class="card widget-chart p-5">
                <i class="fas fa-mouse-pointer fa-3x pink-color"></i>
                <h5>Oi <?php echo $user['name'] ?>, você tem<h5>

                        <div class="widget-numbers"><span class="count-up-wrapper-2 pink-color"><?php echo $user['points'] ?></span></div>
                        <div class="widget-subheading">Pontos</div>
            </div>
            <div class="buttons ml-3">
                <?php if ($user['role'] > 0) : ?>
                <a href="list_user.php" class="btn btn-pink-cake">Gerenciar</a>
                <?php endif; ?>
                <a href="logout.php" class="btn btn-pink-cake">Sair</a>
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/main.js" type="text/javascript"></script>
</body>

</html>