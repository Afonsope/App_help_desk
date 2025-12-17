<?php

    session_start();

    // VARIAVEL
    $usuario_autenticado = false;
    $usuario_id = null;
    $usuario_perfil_id = null;

    $perfis = array(1 => 'Administrativo', 2 => 'Usuário');

    // USUARIOS DO SISTEMA
    $usuarios_app = array(
        array('email' => 'adm@teste.com.br', 'senha' => '123456', 'perfil_id' => 1),
        array('email' => 'user@teste.com.br', 'senha' => '123456', 'perfil_id' => 1),
        array('email' => 'jose@teste.com.br', 'senha' => '123456', 'perfil_id' => 2),
        array('email' => 'maria@teste.com.br', 'senha' => '123456', 'perfil_id' => 2)
    );

    foreach($usuarios_app as $user) {
        if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']) {
            $usuario_autenticado = true;
            $usuario_id = $user['id'];
            $usuario_perfil_id = $user['perfil_id'];
        }
    }

    if($usuario_autenticado) {
        header('Location: home.php');
        $_SESSION['autenticado'] = 'SIM';
        $_SESSION['id'] = $usuario_id;
        $_SESSION['perfil_id'] = $usuario_perfil_id;

    } else {
        header('Location: index.php?login=erro');
        $_SESSION['autenticado'] = 'NAO';
    }

?>