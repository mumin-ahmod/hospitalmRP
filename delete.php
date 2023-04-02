<?php

// INCLUDED VIEW RECORDS AT LAST

include_once 'login.php';

try {

    if (isset($_POST['delete']) && isset($_POST['id'])) { //if delte set

        $id = $_POST['id'];

        $sql = "DELETE FROM classics WHERE id= '$id'"; //making query

        $result = $pdo->query($sql); //performing query/ take resutl
        if (!$result) {
            echo "DELETE failed<br><br>";
        }

        //if anything goes wrong
        // PUT DELTE CODE HERE

    }

    ob_start();

    include 'select.php';

    $title = "Show Records";

    $output = ob_get_clean(); // OB -S WORK IS ENDED & THE WHOLE HTML IS SHOWN in the last line(include layout)

} catch (PDOException $e) {

    $output = 'unable to connect to database' . e->getMessage() . 'in' .
    $e->getFile() . ':' . $e->getLine();

}

include 'templates/layout.html.php';
