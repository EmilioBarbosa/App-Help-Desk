<?php

    session_start();

    $usuario_autenticado = false;
    $usuario_id = null;
    $usuario_perfil_id = null;

    $perfis = [1 => 'admin', 2 => 'usuario'];

    $usuarios_app = [

        array('id' => 1,'email' => 'adm@teste.com.br', 'senha' => '1234', 'perfil_id' => 1),
        array('id' => 2,'email' => 'user@teste.com.br', 'senha' => '123','perfil_id' => 1),
        array('id' => 3,'email' => 'jose@teste.com.br', 'senha' => '1234','perfil_id' => 2),
        array('id' => 4,'email' => 'maria@teste.com.br', 'senha' => '1234','perfil_id' => 2),

    ];

    foreach($usuarios_app as $user) {
        
        if($user['email'] == $_POST['email'] AND $user['senha'] == $_POST['senha']){

            $usuario_autenticado = true;
            $usuario_id = $user['id'];
            $usuario_perfil_id = $user['perfil_id'];
        }
    }

    if($usuario_autenticado){
        $_SESSION['autenticado'] = 'Sim';
        $_SESSION['id'] = $usuario_id;
        $_SESSION['perfil_id'] = $usuario_perfil_id;
        header('location: home.php');
    }else{
        $_SESSION['autenticado'] = 'Não';
        header('location: index.php?login=erro');
    }



?>