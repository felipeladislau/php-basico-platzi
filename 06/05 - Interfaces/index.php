<?php


require('vendor/autoload.php');

abstract class Login{

    abstract public function login();

}


class LoginUser extends Login {

    public function login(){

    }
}



/*
interface LoginInterface {

    public function userLogin();

}


class Login implements loginInterface{

    public function userLogin(){

    }
}
*/


$login = new Login;