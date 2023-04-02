<?php

// INCLUDED VIEW RECORDS AT LAST


try {

    include_once 'databaseConnection.php';
    include_once 'databaseTable.php';

    $doctorsTable = new DatabaseTable($pdo, 'doctors', 'did');

    if (isset($_POST['delete']) && isset($_POST['did'])) { //if delte set

        $did = $_POST['did'];

        // $sql = "DELETE FROM classics WHERE id= '$id'";
        // $result = $pdo->query($sql);
        
        $r = $doctorsTable->delete('did', $did);
        
       
        if (!$r) {
            echo "DELETE failed<br><br>";
        }

        //if anything goes wrong
        // PUT DELTE CODE HERE

    }

    ob_start();

    include_once 'selectDoc.php';

    $title = "Show Records";

    $output = ob_get_clean(); // OB -S WORK IS ENDED & THE WHOLE HTML IS SHOWN in the last line(include layout)

} catch (PDOException $e) {

    $output = 'unable to connect to database' . e->getMessage() . 'in' .
    $e->getFile() . ':' . $e->getLine();

}

include_once 'templates/layout.html.php';
