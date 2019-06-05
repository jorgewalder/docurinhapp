<?php
session_start();
include("includes/conn.php");
include("includes/antiinjection.php");
include("includes/session.php");

if ($user['role'] < 1) {
    header("Location: points.php?msg=Sem Permissão.");
}

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

    <!-- DataTables -->
    <link href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- default css -->
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="main h-100">

        <div class="top-absolute  d-none d-sm-none d-md-block">
            <div class="top-header">
            </div>
            <div class="triangle animated bounce">
                &nbsp;
            </div>
        </div>
        <div class="table-wrap">
            <div class="container">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th data-priority="1">Nome</th>
                            <th>Whats</th>
                            <th>E-mail</th>
                            <th data-priority="1">Pontos</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        //verificar os USUARIOS cadastrados no BD
						$users = mysqli_query($link, "SELECT * FROM users WHERE role < 1 ORDER BY name ");
                        while( $user = mysqli_fetch_array($users) ):
                        ?>
                        <tr>
                            <td><?php echo $user['name'] ?></td>
                            <td><?php echo $user['whats'] ?></td>
                            <td><?php echo $user['email'] ?></td>
                            <td style="padding: 0.5rem 1rem;"><input id="points<?= $user['id'] ?>" type="number" step="5" value="<?= $user['points'] ?>" class="form-control form-control-sm" onblur="saveToDB(<?= $user['id'] ?>)"></td>
                        </tr>
                        <?php endwhile; ?>
                    <tfoot>
                        <tr>
                            <th>Nome</th>
                            <th>Whats</th>
                            <th>E-mail</th>
                            <th>Pontos</th>
                        </tr>
                    </tfoot>
                </table>
                <div class="buttons mt-3">
                    <a href="logout.php" class="btn btn-pink-cake">Sair</a>
                </div>
            </div>            
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/rowreorder/1.2.5/js/dataTables.rowReorder.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="js/main.js" type="text/javascript"></script>

    <script type="text/javascript">
        $('#example').DataTable(
            {
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"
                },
                "columns": [                    
                    null,
                    null,
                    null,
                    { "width": "10%" }
                ],                
                responsive: true
            });
    </script>
</body>

</html>