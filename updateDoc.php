<?php



try {

    include_once 'includes/databaseConnection.php';
    include_once 'classes/databaseTable.php';


    $doctorsTable = new DatabaseTable($pdo, 'doctors', 'did');


    if (isset($_POST['dname']) && // INSERT SET
        isset($_POST['dspeciality']) &&
        isset($_POST['degrees']) &&
        isset($_POST['joined'])&&
        isset($_POST['did'])

    ) {

        $dname = $_POST['dname']; //take the author from
        // html form with get post and save it to the variable ($<-data<-post<html-Form)

        $dspeciality = $_POST['dspeciality'];
        $degree = $_POST['degrees'];
        $joined = $_POST['joined'];
        $did = $_POST['did'];


        $values = [

            'did' => $did,
            'dname' => $dname,
            'dspeciality' => $dspeciality,
            'degree' => $degree,
            'joined' => $joined,
        ];

        $r = $doctorsTable->update($values);

    }

    if (!$r) {
        echo 'Update Failed';
    } else {
       
        echo " <p class=\"bg-info fs-4 text-center\">Updated Successfully! </p>";   

        ob_start();

        $result = $doctorsTable->findAll();

        include 'templates/viewDocs.html.php';

        $title = "Show Doctors";

        $output = ob_get_clean(); // OB -S WORK IS ENDED & THE WHOLE HTML IS SHOWN
    }

} catch (PDOException $e) {

    $output = 'unable to connect to database' . $e->getMessage() . 'in' .
    $e->getFile() . ':' . $e->getLine();

}

include 'templates/layout.html.php';

