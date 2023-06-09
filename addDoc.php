
<?php

include_once 'includes/databaseConnection.php';
include_once 'classes/databaseTable.php';

try {

    $doctorsTable = new DatabaseTable($pdo, 'doctors', 'did');

    if (isset($_POST['dname']) && // INSERT SET
        isset($_POST['dspeciality']) &&
        isset($_POST['degrees']) &&
        isset($_POST['joined'])

    ) {

        $dname = $_POST['dname']; //take the author from
        // html form with get post and save it to the variable ($<-data<-post<html-Form)

        $dspeciality = $_POST['dspeciality'];
        $degree = $_POST['degrees'];
        $joined = $_POST['joined'];

        $values = [

            'dname' => $dname,
            'dspeciality' => $dspeciality,
            'degree' => $degree,
            'joined' => $joined,
        ];

        $r = $doctorsTable->insert($values);

        if (!$r) {
            echo "insert failed <br> <br>";
        } else {
            echo " <p class=\"bg-info fs-4 text-center\">Added Successfully! </p>";
        }

        ob_start();

        $title = 'Add New Record';

        include 'templates/addDoc.html.php';

        $output = ob_get_clean();

        include 'templates/layout.html.php';

    }

} catch (PDOException $e) {

    echo $e;

}
