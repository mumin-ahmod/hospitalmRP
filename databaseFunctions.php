<?php


include_once 'login.php';



 function addRecord($pdo, $author, $title, $cat, $year, $isbn){

$stmt = $pdo->prepare(
    "INSERT INTO classics(author, title, year, isbn, category) 
    VALUES(:author, :title, :year, :isbn, :category)");


$values = [
    ':author' => $author,
    ':title' => $title,
    ':year' => $year,
    ':isbn' => $isbn,
    ':category' => $cat,
    
];

$r = $stmt->execute($values);

return $r;
 }



