<?php

class DocController
{

    // private $authorsTable;
    // private $jokesTable;

    public function __construct(private DatabaseTable $doctorsTable,
        private DatabaseTable $patientsTable) {

    }

    public function findAll()
    {

      

        $title = "Show Doctors";

        $result = $this->doctorsTable->findAll();

     
        ob_start();

        include 'templates/viewDocs.html.php';

        $output = ob_get_clean();

        //echo $output; //output has the value, but is not showing in the index folder;

        return ['output' => $output, 'title' => $title];

    }

    public function home()
    {
        //include_once 'templates/home.php';

        $output = "Homepage";
        $title = "HOSPITAL LTD";

        return ['output' => $output, 'title' => "HOSPITAL LIMITED"];
    }

    public function delete()
    {

        try {

           

            if (isset($_POST['delete']) && isset($_POST['did'])) { //if delte set

                $did = $_POST['did'];

                $r = $this->doctorsTable->delete('did', $did);

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
        header("location: selectDoc.php");

        // include_once 'selectDoc.php';
        // include_once 'templates/layout.html.php';

        return ['output' => $output, 'title' => $title];

    }

    public function edit()
    {

        try {

           

            if (isset($_POST['dname']) && // INSERT SET
                isset($_POST['dspeciality']) &&
                isset($_POST['degrees']) &&
                isset($_POST['joined']) &&
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

                $r = $this->doctorsTable->update($values);

            }

            if (!$r) {
                echo " <p class=\"bg-info fs-4 text-center\">Updated Failed. </p>";

            } else {

                echo " <p class=\"bg-info fs-4 text-center\">Updated Successfully! </p>";

                ob_start();

                $result = $this->doctorsTable->findAll();

                include 'templates/viewDocs.html.php';

                $title = "Show Doctors";

                $output = ob_get_clean(); // OB -S WORK IS ENDED & THE WHOLE HTML IS SHOWN
            }

        } catch (PDOException $e) {

            $output = 'unable to connect to database' . $e->getMessage() . 'in' .
            $e->getFile() . ':' . $e->getLine();

        }

        // include 'templates/layout.html.php';

        return ['output' => $output, 'title' => $title];

    }

}
