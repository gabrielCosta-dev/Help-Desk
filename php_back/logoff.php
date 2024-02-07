<?php 

    session_start();

    session_destroy();

    header('Location:http://localhost/_App-Help-Desk/index.php');

?>