<?php
    require_once 'lib/seguranca/class/user.php';
    require_once 'lib/seguranca/example/config.php';

    $user->logout();

    header('location: login.php');
?>
