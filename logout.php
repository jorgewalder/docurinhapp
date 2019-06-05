<?php
session_start();
// elimina todas as informações relacionadas à sessão atual
session_destroy();

// encerra o manipulador de sessão
session_write_close();

header('location:index.php');