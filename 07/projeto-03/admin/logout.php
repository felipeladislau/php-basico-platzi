<?php
    require '../vendor/autoload.php';
    require '../classes/settings.config.php';
    
    use classes\User;
    use classes\DBConnection;
    
    session_start();

    $user = new User;

    $user->logout();

    header('location: login.php');
?>
