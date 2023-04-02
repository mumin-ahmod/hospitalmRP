
<?php

include_once 'login.php';

include_once 'databaseConnection.php';
include_once 'databaseTable.php';

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
        $degrees = $_POST['degrees'];
        $joined = $_POST['joined'];
  

        // // time to perform the query
        // $sql = "INSERT INTO classics(author, title, year, isbn, category) VALUES('$author', '$title', '$year', '$isbn', '$category')";

        $r = addRecord($pdo, $author, $title, $category, $year, $isbn);

        // $result = $pdo->query($sql);

        if (!$r) {
            echo "insert failed <br> <br>";
        }else{
            echo " <p>Added Successfully. </p>";
        }

        ob_start();

        $title = 'Add New Record';

        include 'templates/addrecord.html.php';


        $output = ob_get_clean();

        include 'templates/layout.html.php';

    }

} catch (PDOException $e) {

    echo $e;

}
