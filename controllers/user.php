<?php

namespace Controllers;



use Database; //instead of include Databasetable class

class UserController
{

    

    public function __construct(private \Database\DatabaseTable $usersTable)
    {

    }

    public function registrationForm()
    {

        echo 'Rform called';

        return [
            'title' => "Sign Up",
            'template' => header('location: templates/signup.html.php'),
            'errors' => [],
        ];

    }

    public function success()
    {
        return [
            'title' => "Sign Up Successful",
            'template' => include 'templates/signupSuccess.html.php',
        ];
    }

    public function signUpSubmit()
    {

        $user = $_POST['user'] ?? [];

        $errors = [];

        if (empty($user['name'])) {
            $errors[] = 'Name cannnot be blank <br>';
        }
        if (empty($user['email'])) {
            $errors[] = 'Email cannnot be blank <br>';
        } else if (filter_var($user['email']) == false) {
            $errors[] = 'Invalid Email';
        }
        if (empty($user['password'])) {
            $errors[] = 'Password cannnot be blank <br>';
        }

        $r = $this->usersTable->find('email', $user['email'] ?? '');

        if (count($r->fetchAll()) > 0) {
            $errors[] = 'This Email is already registered. <br>';
        }

        if (empty($errors)) {

            $user['password'] = password_hash($user['password'], PASSWORD_DEFAULT);
        }

        if (empty($errors)) {

            $this->usersTable->insert($user);

            return [
                'title' => "Sign Up Successful",
                'template' => 'signupSuccess.html.php',
                'errors' => $errors,
            ];
        } else {

            return [
                'title' => "Register Account",
                'template' =>  'signup.html.php',
                'errors' => $errors,
            ];
        }

    }

    

}

