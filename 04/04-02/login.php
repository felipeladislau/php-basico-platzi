<?php


require_once 'lib/seguranca/class/user.php';
require_once 'lib/seguranca/example/config.php';


$email = 'felipe.s.ladislau@gmail.com'; //filter_input(INPUT_POST, 'username', FILTER_SANITIZE_EMAIL);
$password = '123456'; //filter_input(INPUT_POST, 'password', FILTER_DEFAULT);

if( $user->login( $email, $password) ) {
    echo "Login efetuado com sucesso!";
} else {
    $user->printMsg();
    die;
}