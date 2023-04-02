<?php


$title = "Book Records Site";

ob_start();

include_once 'templates/addDoc.html.php';

$output = ob_get_clean();

include_once 'templates/layout.html.php';

?>

