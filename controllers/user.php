<?php

// USER CONTROLLER

include_once 'classes/databaseTable.php';

class UserController
{
    public function __construct(private DatabaseTable $usersTable)
    {

    }

    public function registrationForm()
    {

        echo 'Rform called';

        return [
            'title' => "Sign Up",
            'output' => header('location: templates/signup.html.php'),
            'errors' => [],
        ];

    }

    public function success()
    {
        return [
            'title' => "Sign Up Successful",
            'output' => include_once 'templates/signupSuccess.html.php',
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

    public function loginSubmit()
    {

        $user = $_POST['user'] ?? [];

        if (empty($user['email'])) {
            $errors[] = 'Email cannnot be blank <br>';
        } else if (filter_var($user['email']) == false) {
            $errors[] = 'Invalid Email';
        }
        if (empty($user['password'])) {
            $errors[] = 'Password cannnot be blank <br>';
        }

        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([user['email']]);
        $dbuser = $stmt->fetch();

        if ($user && password_verify($user['pass'], $dbuser['pass'])) {
            $_SESSION['user']=user['email'];
            $_SESSION['role']=$dbuser['role'];
        } else {
            echo "invalid";
        }

    }

    public function isloggedIn()
    {

        if (isset($_SESSION["username"])) {

            // header("Location: login.html.php");

            return [
                'title' => "Logged IN",
                'output' => include 'templates/home.html.php',
                'errors' => $errors,
                'login' => true,
                'role' => $_SESSION["role"],
            ];

        } else {
            return [
                'output' => include 'templates/signup.html.php',
                'login' => false,
                'role' => 'user',
            ];

        }
    }

}
