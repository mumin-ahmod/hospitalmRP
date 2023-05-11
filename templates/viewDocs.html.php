
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

<div class="row">

    <form action= "index.php?action=delete&controller=doc" method="post" class="col">
    <input type='hidden' name='delete' value='yes'>
     <input type='hidden' name='did' value="<?php echo $row['did'] ?>">
    <button class= "btn btn-danger" type="submit">Delete Record</button>
    </form>

    <form action= "updateDoc.html.php" method="post" class="col">
    <input type='hidden' name='placeDoc' value="<?php echo $row['dname'] ?>">
    <input type='hidden' name='placeSpeciality' value="<?php echo $row['dspeciality'] ?>">
    <input type='hidden' name='placDegrees' value="<?php echo $row['degree'] ?>">
    <input type='hidden' name='placeJoined' value="<?php echo $row['joined'] ?>">

     <input type='hidden' name='did' value="<?php echo $row['did'] ?>">
    <button class= "btn btn-info " type="submit">Edit</button>
    </form>

    </div>
  </td>

  </tr>
  <?php
$count++;

}
?>

  </tbody>
</table>



