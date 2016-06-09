<?php

namespace Controller;

use Model\User;

class AuthController{

    private $user_model = null;

    public function __construct(User $user){
        $this->user_model = $user;
    }

    public function getLogin(){

        if(isset($_SESSION['user']))
            header('Location: ?a=admin&e=page');

        return ['view' => 'login.php', 'resource_title' => 'User login'];
    }

    public function getRegister(){
        return ['view' => 'register.php', 'resource_title' => 'Register a new user'];
    }

    public function postLogin(){
        if ($user = $this->user_model->check([
            'email' => $_POST['email'],
            'password' => sha1($_POST['password'])
        ])
        ) {
            $_SESSION['user'] = json_encode($user);
            header('Location: ?a=admin&e=page');
        } else {
            $_SESSION['old_datas'] = $_POST;
            $_SESSION['error'] = 'Wrong credentials';

            return ['view' => 'login.php', 'resource_title' => 'Please Login'];
        }

    }

    public function getLogout(){
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
            setcookie(session_id(),'',time()-3600);

            session_destroy(); //supprime le cookie de session
        }
        header('Location: index.php');
    }

    public function postRegister(){
        $errors = [];

        if (empty($_POST['email'])) {
            $errors['email'] = 'Enter your email';
        } elseif (strpos($_POST['email'], "@", 1) === false) {
            $errors['email'] = 'Enter a valid email';
        }

        if (empty($_POST['pseudo'])) {
            $errors['pseudo'] = 'Enter a username';
        }

        if (empty($_POST['password'])) {
            $errors['password'] = 'Enter a password';
        } elseif (strlen($_POST['password']) < 5) {
            $errors['password'] = 'Enter a password with at least 8 characters';
        }

        if (count($errors) > 0) {
            $_SESSION['errors'] = $errors;
            $_SESSION['old_datas'] = $_POST;
            header('Location: index.php?e=auth&a=getRegister');
            return;
        }

        if ($this->user_model->save([
            'password' => sha1($_POST['password']),  //sha1 : algorithme qui produit une chaine de caractere qui crypte un password
            'email' => $_POST['email'], 
            'name' => $_POST['pseudo']
        ])
        ){
            return ['view' => 'login.php', 'resource_title' => 'Please login'];
        } else {
            $_SESSION['errors'] = ['error' => 'Impossible to write in the database'];
            $_SESSION['old_datas'] = $_POST;
            header('Location: index.php?e=auth&a=getRegister');
        }   
           
        header('Location: index.php?e=auth&a=getLogin');
        return;
    }
}