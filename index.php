<?php
// namespace Hospitalmrp;


include_once 'includes/databaseConnection.php';


include_once 'classes/databaseTable.php';

include_once 'controllers/docController.php';
include_once 'controllers/user.php';
include_once 'auth.php';
// use Database;
// use Controllers;



$doctorsTable = new Database\DatabaseTable($pdo, 'doctors', 'did');
$patientsTable = new Database\DatabaseTable($pdo, 'patients', 'pid');
$userTable = new Database\DatabaseTable($pdo, 'user', 'id');


$action = $_GET['action'] ?? 'home';
$controllerName = $_GET['controller'] ?? 'doc';


$isloggedIn= false;

// echo $action . $controllerName;
// die;

//url rewriting-----------

// $uri = strtok(ltrim($_SERVER['REQUEST_URI'], '/'), '?');
// $pattern = "/hospitalmrp\/index.php/";
// $uri = preg_replace($pattern, '', $uri);
// if ($uri == '') {
//     $uri = "doc/home";
// }


// $uri = ltrim($uri, '/');
// $route = explode('/', $uri);

// $controllerName = array_shift($route);
// $action = array_shift($route);


// --------url done

//controller ca be doc or user/ determining which controller to use

if ($controllerName === 'doc') {

    $Controller = new Controllers\DocController($doctorsTable, $patientsTable);
} else if ($controllerName === 'user') {

    $Controller = new Controllers\UserController($userTable);
}else if($controllerName === 'auth'){
    $Controller = new Hweb\Authentication($pdo, $userTable, 'email', 'password');
}



if ($action == strtolower($action) &&
    $controllerName == strtolower($controllerName)) { 
       
      //making link lowercase
    $Controller->$action();

    
} else {
   
    http_response_code(301);
   
   header( 'location:index.php?action=' . strtolower($action). '&controller='. strtolower($controllerName) );
    exit;
}

$page = $Controller->$action();

$title = $page['title'];
$variables = $page['variables'] ?? [];
// $output = $page['output'];

if (isset($page['variables'])) {
    $result = $variables['result'];
}

ob_start();

include __DIR__ . '\templates\\' . $page['template'];

$output = ob_get_clean();

include 'templates/layout.html.php';
