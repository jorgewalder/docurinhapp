<?php

session_start();
include("includes/conn.php");
include("includes/antiinjection.php");


// transforma todas $_POST[variavel] em $variavel
$id     = isset($_POST["id"])       ? antiinjection($_POST["id"])  : "";
$points = isset($_POST["points"])   ? antiinjection($_POST["points"]) : "";

$editar = mysqli_query($link, "UPDATE users SET points = '$points' WHERE id = '$id'");

$data = ['success' => true];
header('Content-Type: application/json');
echo json_encode($data);