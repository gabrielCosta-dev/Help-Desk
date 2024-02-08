<?php 
    session_start();

    //Texto
    $del = '#';
    $delTroca = '-';

    foreach ($_POST as $chave => $valor) {
        $_POST[$chave] = str_replace($del, $delTroca, $valor);
    }

    $texto = implode($del, $_POST);
    $texto = $_SESSION['id'] . '#' . $texto . PHP_EOL;

    //Arquivo
    $arquivo = fopen('arquivo.hd', 'a');
    fwrite($arquivo, $texto);
    fclose($arquivo);

    //Redirecionamento
    header('Location:http://localhost/_App-Help-Desk/abrir_chamado.php')
?>