
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


<?php

?>

  <br>

  <table class="table table-dark">
  <thead>
    <tr>
    <th scope="col">Doc ID</th>
      <th scope="col">Doctor Name</th>
      <th scope="col">Speciality</th>
      <th scope="col">Degrees</th>
      <th scope="col">Joined</th>

      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

  <?php
$count = 1;

$rowFetch = $result->fetchAll();

foreach ($rowFetch as $row) {

    ?>
   <tr>

    <td> <?php echo $count ?> </td>
    <td><?php echo htmlspecialchars($row['dname']) ?></td>
    <td><?php echo htmlspecialchars($row['dspeciality']) ?></td>
    <td><?php echo htmlspecialchars($row['degree']) ?></td>
    <td><?php echo htmlspecialchars($row['joined']) ?></td>

    <td>


    <form action= "deleteDoc.php" method="post">


    <input type='hidden' name='delete' value='yes'>


      <input type='hidden' name='did' value="<?php echo $row['did'] ?>">



    <button class= "btn btn-danger" type="submit">Delete Record</button>

    </form>

  </td>

  </tr>
  <?php
$count++;

}
?>

  </tbody>
</table>



