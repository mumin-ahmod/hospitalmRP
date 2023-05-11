<?php

namespace Hweb;
use Database;
use Controllers;



include_once 'includes/databaseConnection.php';
include_once 'classes/databaseTable.php';
include_once 'controllers/docController.php';

class Authentication{


    public function __construct(private \PDO $pdo, private Database\DatabaseTable $users, private 
    string $usrnameCol, private string $passCol){

        session_start();
    }


    public function login(){

        // $pdo = new Database\DatabaseTable();


        $user = $_POST['user'] ?? [];

        if (empty($user['email'])) {
            $errors[] = 'Email cannnot be blank <br>';
        } else if (filter_var($user['email']) == false) {
            $errors[] = 'Invalid Email';
        }
        if (empty($user['password'])) {
            $errors[] = 'Password cannnot be blank <br>';
        }

        $m= $user['email'];

        $stmt = $this->pdo->prepare("SELECT * FROM user WHERE email =\"$m\"");
        $stmt->execute();
        $dbuser = $stmt->fetch();

       
        if ($user && password_verify($user['pass'], $dbuser['password'])) {
            $_SESSION['username']=user['email'];
            $_SESSION['password']=$dbuser['password'];

            return true;
        } else {
            echo "invalid";

            return false;
        }
    }


    public function isLoggedIn(){

        if(empty($_SESSION['username'])){
            return false;
        }

        session_regenerate_id();
        $user = $this->users->find($this->usernameCol, $_SESSION['username']);

        if(!empty($user) && $user[0][$passCol] === $_SESSION['password']){
            return true;
        }else{
            return false;
        }
    }


    public function logOut(){
    
    unset($_SESSION['username']);
    unset($_SESSION['username']);

    session_regenerate_id();


    
    }

    


}


