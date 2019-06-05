<?php
session_start();
include("includes/conn.php");
include("includes/antiinjection.php");

// transforma todas $_POST[variavel] em $variavel
$email = isset($_POST["email"]) ? antiinjection($_POST["email"]) : "";
$whats = isset($_POST["whats"]) ? antiinjection($_POST["whats"])  : "";

$check = mysqli_query($link, "SELECT * FROM users WHERE email = '$email' AND whats = '$whats'") or die("erro ao selecionar");

if(mysqli_num_rows ($check) > 0 ){
    $_SESSION['email'] = $email;
    $_SESSION['whats'] = $whats;
    header('location:points.php');
}else{
    unset ($_SESSION['email']);
    unset ($_SESSION['whats']);
    header('location: index.php?msg=E-mail ou whats incorreto.');       
}