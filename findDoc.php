<?php



// INCLUDED VIEW RECORDS AT LAST

try {
    include_once 'includes/databaseConnection.php';
    include_once 'classes/databaseTable.php';

    $doctorsTable = new DatabaseTable($pdo, 'doctors', 'did');

    if (isset($_POST['searchValue'])) { 

        $sv = $_POST['searchValue'];

        $result = $doctorsTable->find('dname', $sv);

    

        if (!$result) {
            echo "find failed";
        }

    }

    ob_start();

    include 'templates/viewDocs.html.php';

    $title = "Show Doctors";

    $output = ob_get_clean();  // OB -S WORK IS ENDED & THE WHOLE HTML IS SHOWN in the last line(include layout)

} catch (PDOException $e) {

    $output = 'unable to connect to database' . e->getMessage() . 'in' .
    $e->getFile() . ':' . $e->getLine();

}


include_once 'templates/layout.html.php';
