<?php

include_once 'includes/databaseConnection.php';
include_once 'classes/databaseTable.php';
include_once 'controllers/docController.php';
include_once 'controllers/user.php';

$doctorsTable = new DatabaseTable($pdo, 'doctors', 'did');
$patientsTable = new DatabaseTable($pdo, 'patients', 'pid');
$userTable = new DatabaseTable($pdo, 'user', 'id');

// echo $_GET['action'];

session_start();

$action = $_GET['action'] ?? 'home';
$controllerName = $_GET['controller'] ?? 'doc';

//controller ca be doc or user/ determining which controller to use

if ($controllerName === 'doc') {

 

    $Controller = new DocController($doctorsTable, $patientsTable);
} else if ($controllerName === 'user') {


    $Controller = new UserController($userTable);
}

// var_dump($Controller);
// die;

if ($action == strtolower($action) &&
    $controllerName == strtolower($controllerName)) { //making link lowercase
    $Controller->$action();
} else {
    http_response_code(301);
    header('location: index.php?action=' . strtolower($action) . "&controller=" . strtolower($controllerName));
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
