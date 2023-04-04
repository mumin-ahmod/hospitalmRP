<?php

try {

    include_once 'includes/databaseConnection.php';
    include_once 'classes/databaseTable.php';

    

    $patientsTable = new DatabaseTable($pdo, 'patients', 'pid');

    $result = $patientsTable->findAll();

    if (!$result) {
        die("Database access failed");
    } else {

        // $rows = $result->rowCount();

        ob_start();

        include 'templates/viewPatients.php';

        $title = "Show Patients";

        $output = ob_get_clean(); // OB -S WORK IS ENDED & THE WHOLE HTML IS SHOWN
    }

} catch (PDOException $e) {

    $output = 'unable to connect to database' . e->getMessage() . 'in' .
    $e->getFile() . ':' . $e->getLine();

}

include 'templates/layout.html.php';
