<?php 

    session_start();

    //Variável autenticação
    $user_autenticado = false;
    $user_id = null;
    $perfil_id = null;

    $perfis = [1=>'Administrativo', 2=>'Usuário'];

    //Usuários do sistema
    $usuarios_app = array(
        ['id'=>1, 'email'=>'admin@teste.com.br', 'senha'=>'123456', 'id_perfil'=> 1],
        ['id'=>2, 'email'=>'user@teste.com.br', 'senha'=>'654321', 'id_perfil'=>1],
        ['id'=>3, 'email'=>'adao@teste.com.br', 'senha'=>'abcdef', 'id_perfil'=>2],
        ['id'=>4, 'email'=>'eva@teste.com.br', 'senha'=>'abcdef', 'id_perfil'=>2]
    );

    foreach ($usuarios_app as $user) {
        if ($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']) {
            $user_autenticado = true;
            $user_id = $user['id'];
            $perfil_id = $user['id_perfil'];
        }
    }

    if ($user_autenticado) {
        $_SESSION['autenticado'] = 'SIM';
        $_SESSION['id'] = $user_id;
        $_SESSION['id_perfil'] = $perfil_id;

        header('Location:http://localhost/_App-Help-Desk/home.php');
    } else {
        $_SESSION['autenticado'] = 'NÃO';
        header('Location:http://localhost/_App-Help-Desk/index.php?login=erro');
        
    }


?>