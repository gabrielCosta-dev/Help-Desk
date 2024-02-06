<?php 
  session_start();

  if ($_SESSION['autenticado'] != 'SIM' || !isset($_SESSION['autenticado'])) {
    header('Location:http://localhost/_App-Help-Desk/index.php?login=erro2');
  }
?>