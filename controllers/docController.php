<?php


class DocController
{

    // private $authorsTable;
    // private $jokesTable;

    public function __construct(private DatabaseTable $doctorsTable,
        private DatabaseTable $patientsTable) {

    }

    // list method in the book
    public function findAll()
    {

        $title = "Show Doctors";

        $result = $this->doctorsTable->findAll();

        //include 'templates/viewDocs.html.php';


        return ['template' => "viewDocs.html.php",
         'title' => $title, 
         
         'variables' => [
             'result' =>$result
         ]
        
        
        ];

    }


    public function home()
    {

        return ['template' => "home.html.php", 'title' => "HOSPITAL LIMITED"];
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



                $result = $this->doctorsTable->findAll();

                // include 'templates/viewDocs.html.php';

                $title = "Doctor Edited";

                // $output = ob_get_clean(); // OB -S WORK IS ENDED & THE WHOLE HTML IS SHOWN
            }

        } catch (PDOException $e) {

            $output = 'unable to connect to database' . $e->getMessage() . 'in' .
            $e->getFile() . ':' . $e->getLine();

        }


        return ['template' =>'viewDocs.html.php',
         'title' => $title,
         'variables' => [
            'result' =>$result
        ]
        
        ];

    }

}
