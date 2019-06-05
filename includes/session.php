<?php

$email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
$whats = isset($_SESSION['whats']) ? $_SESSION['whats'] : '';

if ($email == '' || $whats == '') {
    header("Location: index.php?msg=Efetue o login antes.");
} else {
    $query = mysqli_query($link,"SELECT * FROM users WHERE email = '" . antiinjection($email) . "' AND whats = '" . antiinjection($whats) . "'");
    if (mysqli_num_rows($query) != '1') {
        header("Location: index.php?msg=Problemas com o Login.");
    } else {
        $user = mysqli_fetch_array($query);
    }
}
