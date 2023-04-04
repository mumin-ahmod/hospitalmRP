<?php

// INCLUDED VIEW RECORDS AT LAST

try {

    include_once 'includes/databaseConnection.php';
    include_once 'classes/databaseTable.php';

    $doctorsTable = new DatabaseTable($pdo, 'doctors', 'did');

    if (isset($_POST['delete']) && isset($_POST['did'])) { //if delte set

        $did = $_POST['did'];

        $r = $doctorsTable->delete('did', $did);

        if (!$r) {
            echo "DELETE failed<br><br>";
        }


    }

    ob_start();

    $title = "Show Records";

    $output = ob_get_clean(); // OB -S WORK IS ENDED & THE WHOLE HTML IS SHOWN in the last line(include layout)

} catch (PDOException $e) {

    $output = 'unable to connect to database' . e->getMessage() . 'in' .
    $e->getFile() . ':' . $e->getLine();

}

include_once 'selectDoc.php';
include_once 'templates/layout.html.php';
