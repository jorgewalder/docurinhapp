<?php
session_start();
include("includes/conn.php");
include("includes/antiinjection.php");

//checa se usuário está em sessão
$email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
$whats = isset($_SESSION['whats']) ? $_SESSION['whats'] : '';

if ($email != '' || $whats != '') {
    header("Location: points.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
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

        <section class="welcome h-100">
            <div class="container h-100">
                <div class="row h-100">
                    <div class="col-md-4 offset-md-2 h-100 d-flex justify-content-center align-items-center">
                        <div class="w-100">
                            <h2 class="pink-color">
                                Programa Fidelidade
                            </h2>
                            <div id="box-login">
                                <?php
                                /* Mostrar mensagens */
                                $msg = isset($_GET["msg"]) ? antiinjection($_GET["msg"]) : "";
                                if (!empty($msg)) :
                                    ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $msg ?>
                                    </div>
                                <?php endif; ?>
                                <form class="mar-top-20" method="post" action="login.php">
                                    <div class="form-group">
                                        <input autocomplete="off" class="form-control form-default" name="email" placeholder="E-mail" type="text">
                                    </div>
                                    <div class="form-group">
                                        <input autocomplete="off" class="form-control form-default" name="whats" placeholder="Whats" type="password">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-lg btn-pink-cake btn-send mar-top-20">Entrar</button>
                                    </div>
                                </form>
                                <hr>
                                <p>Crie sua conta e ganhe 5 pontos!</p>
                                <button class="btn btn-pink-cake" onclick="viewCadastro()">CRIAR CONTA</button>
                            </div>
                            <div id="box-cadastro" style="display:none">
                                <div id="add_alert" class="alert alert-danger" role="alert" style="display:none">

                                </div>
                                <form id="add_user_form" class="mar-top-20" method="post" action="ajax_add_user.php">
                                    <div class="form-group">
                                        <input autocomplete="off" class="form-control form-default" name="name" placeholder="Nome" type="text" required>
                                    </div>
                                    <div class="form-group">
                                        <input autocomplete="off" class="form-control form-default" name="email" placeholder="E-mail" type="email" required>
                                    </div>
                                    <div class="form-group">
                                        <input autocomplete="off" class="form-control form-default" name="whats" placeholder="Whats" type="text" required>
                                    </div>
                                    <div class="form-group">
                                        <button id="add_user_submit" class="btn btn-lg btn-pink-cake btn-send mar-top-20">Cadastrar</button>
                                    </div>
                                </form>
                            </div>

                            <img alt="Logo doçurinha" class="d-block d-sm-block d-md-none mini-logo" src="img/logo.png">
                        </div>
                    </div>

                    <div class="col-md-4 h-100 d-md-flex justify-content-center align-items-center d-none d-sm-none d-md-block">
                        <img alt="Logo doçurinha" class="img-fluid" src="img/logo.png">
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/main.js" type="text/javascript"></script>
</body>

</html>