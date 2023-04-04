<?php

try {

    include_once 'includes/databaseConnection.php';
    include_once 'classes/databaseTable.php';


    $doctorsTable = new DatabaseTable($pdo, 'doctors', 'did');


    $result = $doctorsTable->findAll();

    if (!$result) {
        die("Database access failed");
    } else {

        ob_start();

        include 'templates/viewDocs.html.php';

        $title = "Show Doctors";

        $output = ob_get_clean(); // OB -S WORK IS ENDED & THE WHOLE HTML IS SHOWN
    }

} catch (PDOException $e) {

    $output = 'unable to connect to database' . e->getMessage() . 'in' .
    $e->getFile() . ':' . $e->getLine();

}

include 'templates/layout.html.php';
