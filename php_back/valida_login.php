<?php 

    session_start();

    //Variável autenticação
    $user_autenticado = false;

    //Usuários do sistema
    $usuarios_app = array(
        ['email'=>'admin@teste.com.br', 'senha'=>'123456'],
        ['email'=>'user@teste.com.br', 'senha'=>'654321'],
    );

    foreach ($usuarios_app as $user) {
        if ($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']) {
            $user_autenticado = true;
        }
    }

    if ($user_autenticado) {
        $_SESSION['autenticado'] = 'SIM';

        //Teste
        $_SESSION['x'] = 'Um valor';
        $_SESSION['y'] = 'Outro valor';

        header('Location:http://localhost/_App-Help-Desk/home.php');
    } else {
        $_SESSION['autenticado'] = 'NÃO';
        header('Location:http://localhost/_App-Help-Desk/index.php?login=erro');
        
    }


?>