<?php


try {

    include_once 'includes/databaseConnection.php';
    include_once 'classes/databaseTable.php';
    include_once 'controllers/docController.php';


    $doctorsTable = new DatabaseTable($pdo, 'doctors', 'did');  
    $patientsTable = new DatabaseTable($pdo, 'patients', 'pid');


    $dController = new DocController($doctorsTable, $patientsTable);


    // if(isset($_GET['edit'])){
    //     $page = $hController->edit();
    // }if(isset($_GET['findAll'])){
    //     $page = $hController->findAll();
    // }if(isset($_GET['delete'])){
    //     $page = $hController->delete();
    // }if(isset($_GET['home'])){
    //     $page = $hController->home();
    // } //THIS BLOCK IS REPLACING WITH:

    $action = $_GET['action'] ?? 'home';
    $page= $dController->$action();

    $title = $page['title'];
    $output = $page['output'];


    ob_start();


     ob_get_clean();


     include_once 'templates/layout.html.php';




} catch (PDOException $e) {

    $title = 'An Error Occurred';

    $output = 'unable to connect to database' . e->getMessage() . 'in' .
    $e->getFile() . ':' . $e->getLine();
}



?>
