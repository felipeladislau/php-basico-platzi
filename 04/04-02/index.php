<?php

    session_start();

    if( isset($_SESSION['user']['logged']) ){
        echo "Usuário esta logado!";
    }else{
        echo "Não estamos logados...";
    }
