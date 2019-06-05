<?php
session_start();
include("includes/conn.php");
include("includes/antiinjection.php");

header('Content-Type: application/json');

// transforma todas $_POST[variavel] em $variavel
$name  = isset($_POST["name"])  ? antiinjection($_POST["name"])  : "";
$email = isset($_POST["email"]) ? antiinjection($_POST["email"]) : "";
$whats = isset($_POST["whats"]) ? antiinjection($_POST["whats"])  : "";

// verifica se há email cadastrado no BD
$users = mysqli_query($link, "SELECT * FROM users WHERE email='$email'");
if( mysqli_num_rows( $users ) > 0 ){

    $data = ['success' => false, 'message' => "Email cadastrado, escolha outro."];  
}else{

    $add = mysqli_query($link, "INSERT INTO users (name, email, whats, role, points) VALUES ('$name','$email','$whats', '0', '5')");

    if ($add) {
        $_SESSION['email'] = $email;
        $_SESSION['whats'] = $whats;
        $data = ['success' => true, 'message' => "Usuário cadastrado com sucesso."];
    } else {
        $data = ['success' => false, 'message' => "Não foi possível cadastrar esse usuário."];
    }
}
echo json_encode($data);