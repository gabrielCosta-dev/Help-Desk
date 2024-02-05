<?php 

    /* $_POST['email'];
    $_POST['senha']; */

    //Variável autenticação
    $user_autenticado = false;

    //Usuários do sistema
    $usuarios_app = array(
        ['email'=>'admin@teste.com.br', 'senha'=>'123456'],
        ['email'=>'user@teste.com.br', 'senha'=>'654321'],
    );

    /* echo '<pre>';
    print_r($usuarios_app);
    print_r($_POST);
    echo '</pre>'; */

    foreach ($usuarios_app as $user) {
        if ($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']) {
            $user_autenticado = true;
        }
    }

    if ($user_autenticado) {
        echo 'Usuário autenticado';
    } else {
        header('Location:http://localhost/_App-Help-Desk/index.php?login=erro');
    }

    //GET e POST
    #$a=[/* $_GET['email'];
        /* $_GET['senha'];
        print_r($_GET); */
        /* $_POST['email'];
        $_POST['senha']; 
        print_r($_POST);] */

?>